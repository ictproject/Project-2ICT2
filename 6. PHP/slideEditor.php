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

// Redirect to Home if not logged in
if (!$loggedIn) {
    header('Location: index.php');
}

// get presentation id
$Pid = SpoonFilter::getGetValue('Pid', null, 0);

// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);

/*
 * Page Template
 */

$Page = new SpoonTemplate ();

// Compile options
$Page->setForceCompile ( COMPILE_TEMPLATES );
$Page->setCompileDirectory ( 'templates/compiled' );

// Page assigns

//template links
$Page->assign('self', $_SERVER['PHP_SELF'] . '?Pid=' . $Pid);

// show the output
$Page->display ('templates/slideEditor.tpl');

?>