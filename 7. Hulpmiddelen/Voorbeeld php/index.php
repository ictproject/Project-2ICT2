<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// Retrieve all messages
$messages = $db->getRecords ( 'SELECT * FROM data WHERE type="message"' );

// get all images
$get_images = SpoonFile::getList(GALLERY_IMAGE_PATH);
$images = array();
$count = 0;
foreach ($get_images as $image){
	if ($image != 'no_image.jpg'){
		if ($count == 0){
			$images[] = array('src' => $image, 'first' => 'class="show"');
		}else{
			$images[] = array('src' => $image, 'first' => '');
		}
		$count++;
	}
}

// js
$js = array ();
$js [] = array ('js' => 'core/js/jquery-1.3.1.min.js' );
$js [] = array ('js' => 'core/js/slideshow.js' );

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

// home navigation
$Main->assign ( 'home_nav', true );

// Page title
$Main->assign ( 'title', 'Agrotechniek Van Massenhove' );

// Javascript
$Main->assign ( 'javascript', true );
$Main->assign ( 'scripts', $js );

/*
 * Page Template
 */

$Page = new SpoonTemplate ();

$Page->setForceCompile ( true );
$Page->setCompileDirectory ( 'templates/compiled' );
$Page->assign ( 'page_header', 'Welkom' );

// Messages
if ($messages != null) {
	$Page->assign ( 'oMessages', true );
	$Page->assign ( 'iMessages', $messages );
}

// assign images
$Page->assign('iImages', $images);
$Page->assign('gallery_image_path', GALLERY_IMAGE_PATH);

$Page->assign ( 'message_image_path', MESSAGE_IMAGE_PATH );

// assign page to main
$Main->assign ( 'page_content', $Page->getContent ( 'templates/index.tpl' ) );
// show the output, using 'template.tpl'
$Main->display ( 'templates/layout.tpl' );

?>