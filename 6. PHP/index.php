<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

// Variables
$username = '';
$logged_in = false;

// start or continue session
SpoonSession::start();

// Username
$loggedIn = SpoonSession::exists ( 'username' );
if ($loggedIn) {
	$username = SpoonSession::get('username');
}
// database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );
// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);
// load template
$Main = new SpoonTemplate ();

// Compile options
$Main->setForceCompile ( COMPILE_TEMPLATES );
$Main->setCompileDirectory ( 'templates/compiled' );

// meta & css
$Main->assign('pageMeta', @'<link rel="stylesheet" href="core/css/deck.js/horizontal-slide.css" type="text/css"> 
                            <script src="core/js/deck.js/modernizr.custom.js"></script>');

$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/index.css" />');

// user
$Main->assign('oLoggedIn', $loggedIn);
$Main->assign('username', $username);
//if user logged in assign profile.php?id={user.id}
if($user != null) {
    $Main->assign('user', $user);
}
/*
 * Page Template
 */

$Page = new SpoonTemplate ();

// Compile options
$Page->setForceCompile ( COMPILE_TEMPLATES );
$Page->setCompileDirectory ( 'templates/compiled' );

// Page assigns

// show the output
$Main->assign ( 'pageContent', $Page->getContent ( 'templates/index.tpl' ) );
$Main->display ('templates/layout.tpl');

?>