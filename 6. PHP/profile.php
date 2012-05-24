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
SpoonSession::set('username', 'Maxim');

// Username
$loggedIn = SpoonSession::exists ( 'username' );
if ($loggedIn) {
	$username = SpoonSession::get('username');
}

// database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// load presentation names
$presentations = $db->getRecords('SELECT  p.name  FROM presentations AS p INNER JOIN users AS u ON p.owner = u.id WHERE u.username = ?', $username);

// load user info
$user = $db->getRecord('SELECT * FROM user WHERE username = ?', $username);

// load groupnames
$groups = $db->getRecords('SELECT g.name FROM openpresentations.groups AS g INNER JOIN openpresentations.users_has_groups AS u ON g.id = u.group_id WHERE u.user_id = ?', $user['id']);

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
$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/profile.css" />');

// user
$Main->assign('oLoggedIn', $loggedIn);
$Main->assign('username', $username);

/*
 * Page Template
 */
$Page = new SpoonTemplate ();

$Page->setForceCompile ( COMPILE_TEMPLATES );
$Page->setCompileDirectory ( 'templates/compiled' );

// iterate presentations
$Page->assign('iPresentations', $presentations);

// assign user info
$Page->assign('fullName', $user['firstname']. ' ' . $user['name']);
$Page->assign('email', 'N/A');
$Page->assign('memberSince', date("d F Y", strtotime($user['member_since']))); 

// assign img source
$Page->assign('imgSrc', ($user['profile_picture'] === null) ? 'core/img/Poker_FaceCzyste.png' : $user['profile_picture']);

// iterate groups
$Page->assign('iGroups', $groups);

$Main->assign ( 'pageContent', $Page->getContent ( 'templates/profile.tpl' ) );
// show the output
$Main->display ('templates/layout.tpl');

?>