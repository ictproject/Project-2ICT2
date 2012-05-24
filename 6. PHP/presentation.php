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
$sessionID = "";
$username = "";
$live = false;


// start or continue session
SpoonSession::start();

// Live presentation?
$presentationID = SpoonFilter::getGetValue('live',null,'');
if ($presentationID != ''){
   $live = true;
}else{
     // normal presentation
    $presentationID = SpoonFilter::getGetValue('p',null,'');
}

// logged in
// Username
$loggedIn = SpoonSession::exists ( 'username' );
if ($loggedIn) {
	$username = SpoonSession::get('username');
}

$sessionID = SpoonSession::getSessionID();

// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );



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

// owner id -> owner name
$record = $db->getRecord('SELECT username FROM users WHERE id = ?', $owner);
$owner = $record['username'];

// share options
if($share != 'public'){
    if(!$loggedIn){
        header('Location:index.php');
    }
}

if($share == 'private'){
    if($owner != $username){
        header('Location:index.php');
    }
    $live = false; // live not necessary when private
}

if($share == 'group'){
// @todo check if user in allowed group
}


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
			$slide['image'] = USERS_PATH . $username. '/presentations/images/' . $tmpSlide['image'];
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

$Main->assign('sessionID', $sessionID);
$Main->assign('presentationID', $presentationID);

$Main->assign('nodeServer', NODESERVER);

$Main->assign('oLive', $live);

$Main->assign('oAdmin', $username == $owner);





// show the output
$Main->display ('templates/presentation.tpl');

?>