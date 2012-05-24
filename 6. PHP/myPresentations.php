<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

// Variables
$presentations = array();
$username = '';
$loggedIn = false;

//start or continue session
SpoonSession::start();

// Username
$loggedIn = SpoonSession::exists ( 'username' );
if ($loggedIn) {
	$username = SpoonSession::get('username');
}

// database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// load presentation names
$presentations = $db->getRecords('SELECT  p.name  FROM presentations AS p INNER JOIN users AS u ON p.owner = u.id WHERE u.username = ?', $username);

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
$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/myPresentations.css" />');

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
if ($presentations != null){
	$Page->assign('iPresentations', $presentations);
}
$Page->assign('oPresentations', $presentations != null);


$Main->assign ( 'pageContent', $Page->getContent ( 'templates/myPresentations.tpl' ) );
// show the output
$Main->display ('templates/layout.tpl');

?>