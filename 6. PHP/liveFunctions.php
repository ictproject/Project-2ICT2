<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

// start or continue session
SpoonSession::start();

// Variables
$logged_in = false;
$username = SpoonSession::get('username') == null ? 'anonymous' : SpoonSession::get('username');
$presentationID = SpoonFilter::getGetValue('p',null,'');
$oChat = true;



// logged in
$logged_in = SpoonSession::exists ( 'username' );


// load template
$Main = new SpoonTemplate ();

// Compile options
$Main->setForceCompile ( COMPILE_TEMPLATES );
$Main->setCompileDirectory ( 'templates/compiled' );

// assigns
$Main->assign('title', 'Live Functions');

$Main->assign('username', $username);
$Main->assign('presentationID', $presentationID);
$Main->assign('nodeServer', NODESERVER);

$Main->assign('oChatbox', oChat);


// show the output
$Main->display ('templates/liveFunctions.tpl');

?>