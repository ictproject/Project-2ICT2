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
else {
    header('Location: index.php ');
}

// database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

//load only groups where the user is admin
$createdGroups = $db->getRecords('SELECT g.name, g.id FROM openpresentations.groups AS g INNER JOIN openpresentations.users AS u ON g.admin = u.id WHERE u.username= ?',$username);
if($createdGroups === null) {
    $createdGroups = array();
}
// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);

$userIdParameters = Array();
$userIdParameters[0] = $user['id'];
$userIdParameters[1] = $user['id'];
// load Mygroupnames but not the groups where the user is admin
//groups where user is member
$myGroups = $db->getRecords('SELECT g.name, g.id FROM openpresentations.groups AS g INNER JOIN openpresentations.users_has_groups AS u ON g.id = u.group_id WHERE u.user_id = ? && g.admin != ?', $userIdParameters);
if($myGroups === null) {
    $myGroups = array();
}

//random groups //searched
//$searchGroup = SpoonFilter::getGetValue('searchGroup', null, '');
if('POST' == $_SERVER['REQUEST_METHOD']) {
    $AllGroups = $db->getRecords('SELECT groups.name, groups.id FROM `groups` WHERE share="public" && groups.name like "%' .$_POST['search'] . '%" ');
}else {
    $AllGroups = $db->getRecords('SELECT groups.name, groups.id FROM `groups` WHERE share="public"');
}


if($AllGroups === null) {
    $AllGroups = array();
}

// get group id and user id to delete from users_has_groups

$deleteUserID = SpoonFilter::getGetValue('userId', null, '');
$deleteGroupID = SpoonFilter::getGetValue('groupId',null, '');

$delete =  Array();
$delete[0] = $deleteUserID;
$delete[1] = $deleteGroupID;

if($delete != null) {
    if($db->delete('users_has_groups', 'user_id = ? && group_id = ?', $delete) == 1) {
        header('Location: editGroups.php ');
    }
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
$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/groupsEdit.css" />');

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


// iterate groups
$Page->assign('user', $user);
$Page->assign('iGroups', $myGroups);
$Page->assign('iCreatedGroups',$createdGroups);
$Page->assign('iAllGroups',$AllGroups);


$Main->assign ( 'pageContent', $Page->getContent ( 'templates/editGroups.tpl' ) );
// show the output
$Main->display ('templates/layout.tpl');

?>