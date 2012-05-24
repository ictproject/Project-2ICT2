<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

// Variables
$logged_in = false;

// start or continue session
SpoonSession::start();

// redirect if logged in
$logged_in = SpoonSession::exists ( 'username' );
if ($logged_in) {
	header('Location: mypresentations.php');
}


// load template
$Main = new SpoonTemplate ();

// Compile options
$Main->setForceCompile ( COMPILE_TEMPLATES );
$Main->setCompileDirectory ( 'templates/compiled' );

// meta & css
$Main->assign('pageMeta', '');
$Main->assign('pageCss', '<link rel="stylesheet" type="text/css" media="screen" href="core/css/registerComplete.css" />');

//user
$Main->assign('oLoggedIn', false);

/*
 * Page Template
 */

$Page = new SpoonTemplate ();

// Compile options
$Page->setForceCompile ( COMPILE_TEMPLATES );
$Page->setCompileDirectory ( 'templates/compiled' );

// Page assigns


// show the output
$Main->assign ( 'pageContent', $Page->getContent ( 'templates/registerComplete.tpl' ) );
$Main->display ('templates/layout.tpl');

?>