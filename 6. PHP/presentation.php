<?php

// set include path
define ( 'PATH_LIBRARY', dirname ( __FILE__ ) . '/library' );
set_include_path ( get_include_path () . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR );

// classes
require_once 'library/spoon/spoon.php';
require_once 'core/includes/config.php';

// Variables
$logged_in = false;
$presentationName = "";
$presentationID = -1;
$share = '';
$owner = '';
$slides = array();


// start or continue session
SpoonSession::start();

// logged in
$logged_in = SpoonSession::exists ( 'username' );


// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// name presentation
$presentationID = SpoonFilter::getGetValue('p',null,'');

// check GET value
if($presentationID == ''){
	header('Location: myPresentations.php');
}

// does the presentation exist
$record = $db->getRecord('SELECT * FROM presentations WHERE id = ?', $presentationID);
if($record){
	$presentationName = $record['name'];
	$share = $record['share'];
	$owner = $record['owner'];
}else{
	header('Location: myPresentations.php');
}

// @todo check share options


// assign slides
$dbSlides = $db->getRecords('SELECT * FROM slides WHERE presentation_id = ? ORDER BY nr', $presentationID);

foreach ($dbSlides as $tmpSlide){
	$slide = array();
	switch($tmpSlide['template']){
		case 'title':
			$slide['titleSlide'] = true;
			$slide['title'] = $tmpSlide['title'];
			$slide['subtitle'] = $tmpSlide['content'];
			break;
		case 'content':
			$slide['contentSlide'] = true;
			$slide['title'] = $tmpSlide['title'];
			$slide['content'] = $tmpSlide['content'];
			break;
		case 'image':
			$slide['imageSlide'] = true;
			$slide['title'] = $tmpSlide['title'];
			$slide['image'] = $tmpSlide['image'];
			break;
		case 'video':
			$slide['videoSlide'] = true;
			$slide['title'] = $tmpSlide['title'];
			$slide['video'] = $tmpSlide['video'];
			break;
		default: 
			die('error');
	}
	array_push($slides, $slide);
}



// load template
$Main = new SpoonTemplate ();

// Compile options
$Main->setForceCompile ( COMPILE_TEMPLATES );
$Main->setCompileDirectory ( 'templates/compiled' );

// assigns
$Main->assign('title', $presentationName);

$Main->assign('iSlides', $slides);


// show the output
$Main->display ('templates/presentation.tpl');

?>