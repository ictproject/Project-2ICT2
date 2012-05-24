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

$userInGroup = false;
$userIsAdmin = false;

$members = $db->getRecords('SELECT u.id, u.username, u.profile_picture FROM users AS u INNER JOIN users_has_groups as u_h_g ON u.id = u_h_g.user_id WHERE u_h_g.group_id = ?', $GroupID);
$NumberOfMembers = $db->getVar('SELECT COUNT(*) AS count FROM users AS u INNER JOIN users_has_groups as u_h_g ON u.id = u_h_g.user_id WHERE u_h_g.group_id = ?', $GroupID);

$count = sizeof($members);

//if group is private ? --> redirect to home page 
//but if user is member --> access to page
for($counter=0;$counter<$count;$counter++){
    if($members[$counter]['username'] == $user['username']) {
        //user is a member of the group
        $userInGroup = true; 
    }
}

if($userInGroup == true) {
    $GroupParameters = array();
    $GroupParameters[0] = $GroupID;
    $GroupParameters[1] = $user['id'];
    $Group = $db->getRecord('SELECT * FROM openpresentations.groups AS g INNER JOIN users_has_groups AS u_h_g ON g.id = u_h_g.group_id WHERE g.id = ? && u_h_g.user_id = ?', $GroupParameters);
}
else {
    $Group = $db->getRecord('SELECT * FROM openpresentations.groups AS g INNER JOIN users_has_groups AS u_h_g ON g.id = u_h_g.group_id WHERE g.id = ? ', $GroupID);
}

if($Group == null) {
     header ( 'Location: index.php');
}
$admin = $db->getRecord('SELECT u.id,u.username FROM openpresentations.users AS u INNER JOIN openpresentations.groups AS g ON u.id = g.admin WHERE g.admin= ?', $Group['admin']);
$presentations = $db->getRecords('SELECT  p.name, p.id  FROM presentations AS p  WHERE groups_id = ?', $GroupID);

//user logged in == admin of the group
if($Group['admin'] == $user['id']) {
    $userIsAdmin = true;
}
if($Group['share'] == 'private' && $userInGroup == false) {
    header ( 'Location: index.php');
}

$Join = SpoonFilter::getGetValue('join', null, '');
if($Join != null) {
        $user_has_groups = array();
        $user_has_groups['user_id'] = $user['id'];
        $user_has_groups['group_id'] = $Group['id'];

        $db->insert('users_has_groups', $user_has_groups);
        header('Location: groupPageNormalUser.php?id='.$GroupID);
        
}
else {
    $Join = array();
}
//button leave is pushed
$Leave = SpoonFilter::getGetValue('leave', null, '');
if($Leave != null) {
        $user_has_groups = array();
        $user_has_groups[0] = $user['id'];
        $user_has_groups[1] = $Group['id'];
        if($db->delete('users_has_groups', 'user_id = ? && group_id = ?', $user_has_groups) == 1) {
            header('Location: groupPageNormalUser.php?id='.$GroupID);
        }
}
else {
    $Leave = array();
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
$Main->assign('pageMeta', '');
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

$Page->assign('oUserIsAdmin', $userIsAdmin);
$Page->assign('oJoin', $userInGroup);
$Page->assign('Group', $Group);
$Page->assign('admin', $admin);

// iterate presentations
$Page->assign('iPresentations', $presentations);

$Page->assign('NumberOfMembers', $NumberOfMembers);
// iterate members
$Page->assign('iMembers', $members);



$Main->assign ( 'pageContent', $Page->getContent ( 'templates/groupPageNormalUser.tpl' ) );
// show the output
$Main->display ('templates/layout.tpl');

?>