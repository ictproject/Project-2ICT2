<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

//start or continue session
SpoonSession::start();

// voorlopig zelf username zetten
//SpoonSession::set('username', 'Maxim');

// Username
$loggedIn = SpoonSession::exists ( 'username' );
if ($loggedIn) {
	$username = SpoonSession::get('username');
}

// database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );


$GroupID = SpoonFilter::getGetValue('id', null, '');
if($GroupID === '') {
    $GroupID = array();
    header ( 'Location: index.php');
}

    

// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);

$GroupParameters = array();
$GroupParameters[0] = $GroupID;
$GroupParameters[1] = $user['id'];
//DATABASE INFO

$Group = $db->getRecord('SELECT * FROM openpresentations.groups AS g  WHERE g.id = ? && g.admin= ?',$GroupParameters);
$admin = $db->getRecord('SELECT u.id, u.username FROM openpresentations.users AS u INNER JOIN openpresentations.groups AS g ON u.id = g.admin WHERE g.admin= ?', $user['id']);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! volgende query zou moeten verandert worden naar  where presentation.group_id = ? $GroupID
$presentations = $db->getRecords('SELECT  p.name, p.id  FROM presentations AS p  WHERE groups_id = ?', $GroupID);
$members = $db->getRecords('SELECT u.id, u.username, u.profile_picture FROM users AS u INNER JOIN users_has_groups as u_h_g ON u.id = u_h_g.user_id WHERE u_h_g.group_id = ?', $GroupID);
$NumberOfMembers = $db->getVar('SELECT COUNT(*) AS count FROM users AS u INNER JOIN users_has_groups as u_h_g ON u.id = u_h_g.user_id WHERE u_h_g.group_id = ?', $GroupID);

//if id of user is not the same as the id of the group = redirect to normalpageView
if(!($user['id'] == $Group['admin'])) {
    header ( 'Location: groupPageNormalUser.php?id='.$GroupID );
}
//delete link is pushed
$deleteGroupID = SpoonFilter::getGetValue('DeleteGroupId', null, '');
if($deleteGroupID != null) {
        
        if($db->delete('groups', 'id = ?', $deleteGroupID) == 1) {
            header('Location: editGroups.php');
        }
}
else {
    $deleteGroupID = array();
}
/*
 * Delete member of group
 */
$deleteMemberID = SpoonFilter::getGetValue('UserId', null, '');

if($deleteMemberID != null) {
        //user id is not the same as the admin id
        if(!($deleteMemberID == $Group['admin'])) {
            $deleteMemberParameters = array();
            $deleteMemberParameters[0] = $deleteMemberID;
            $deleteMemberParameters[1] = $GroupID;
            if($db->delete('users_has_groups', 'user_id = ? && group_id = ?', $deleteMemberParameters) == 1) {
                header('Location: groupPageAdmin.php?id='.$GroupID);
            }
        }
        header('Location: groupPageAdmin.php?id='.$GroupID);
}

if($Group === null) {
    $Group = array();
}
if($admin === null) {
    $admin = array();
}
if($presentations === null) {
    $presentations = array();
}
if($members === null) {
    $members = array();
}
if($NumberOfMembers === null) {
    $NumberOfMembers = array();
}


/*
 *Edit requests 
 * 
 */
//collect text box values
$record = array();
$txtTitle       = isset($_POST['txtTitle'])?$_POST['txtTitle']:"";
$txtDescription = isset($_POST['txtDescription'])?$_POST['txtDescription']:"";

//enter pressed update the database with the correct Title or/and description
if('POST' == $_SERVER['REQUEST_METHOD']) { 
    if($txtTitle != "") {
        $record['name'] = $txtTitle;
    }
    if($txtDescription != "") {
        $record['description'] = $txtDescription;
    }
    if(sizeof($record)) {
        $rows = $db->update('groups', $record, 'id = ?', $GroupID);
        if(sizeof($rows)) {
            header ( 'Location: groupPageAdmin.php?id='.$GroupID);
        }
    }
    $AllUsers = $db->getRecords('SELECT * FROM users WHERE users.username like "%' .$_POST['search'] . '%" && id NOT IN (SELECT user_id From users_has_groups WHERE group_id = ?)', $GroupID);
//
    //for each checkbox that is checked insert the user into users_has_groups
     if (isset($_POST['users'])){ 
        foreach ($_POST['users'] as $UserId) {
            if (isset($_POST['users'])){ 
                // set our record values
                $record = array();
                $record['user_id'] = $UserId;
                $record['group_id'] = $GroupID;

                $db->insert('users_has_groups', $record); 
                header ( 'Location: groupPageAdmin.php?id='.$GroupID);
            } 
        }
     }
     header ( 'Location: groupPageAdmin.php?id='.$GroupID);
}
else {
    $AllUsers = $db->getRecords('SELECT * FROM users WHERE id NOT IN (SELECT user_id From users_has_groups WHERE group_id = ?)', $GroupID);
}

if($AllUsers === null) {
    $AllUsers = array();
}
// load template
$Main = new SpoonTemplate ();

/*
 * Should this template be recompiled to PHP every time you execute this PHP
 * script. This is encouraged to be enabled during development, since changes to
 * your template file won't be visible otherwise.
 */
$Main->setForceCompile ( COMPILE_TEMPLATES );

/*
 * By default, the compiled templates will be stored in the directory wherein
 * your PHP script resides. Since this is nasty, we advise you to choose a good
 * location where these files may be stored.
 */
$Main->setCompileDirectory ( 'templates/compiled' );

// meta & css
$Main->assign('pageMeta', '<script src="core/js/editToggleAdmin.js" type="text/javascript"></script>');
$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/groupPageAdmin.css" />');

// user
$Main->assign('oLoggedIn', $loggedIn);
$Main->assign('username', $username);
if($user != null) {
    $Main->assign('user', $user);
}
/*
 * Page Template
 */
$Page = new SpoonTemplate ();

$Page->setForceCompile ( COMPILE_TEMPLATES );
$Page->setCompileDirectory ( 'templates/compiled' );

$Page->assign('Group', $Group);
$Page->assign('admin', $admin);
$Page->assign('user', $user);
// iterate presentations
$Page->assign('iPresentations', $presentations);

$Page->assign('NumberOfMembers', $NumberOfMembers);
// iterate members
$Page->assign('iMembers', $members);
//iterate users
$Page->assign('iAllUsers', $AllUsers);

$Main->assign ( 'pageContent', $Page->getContent ( 'templates/groupPageAdmin.tpl' ) );
// show the output
$Main->display ('templates/layout.tpl');

?>