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

// Username
$logged_in = SpoonSession::exists ( 'username' );
if ($logged_in) {
	header('Location: mypresentations.php');
}

// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// Form
$frm = new SpoonForm('frmRegister');

$frm->setParameter('class', 'clearfix');

$frm->addText('username');
$frm->addText('firstname');
$frm->addText('name');
$frm->addText('email');
$frm->addPassword('pass');
$frm->addPassword('repeatPass');
$frm->addImage('profilePic');

$frm->addButton('submit', 'Submit');


// Form handler

if($frm->isSubmitted())
{
	// name is required
	if($frm->getField('username')->isFilled('Please fill out your username')){
		if($db->getRecord('SELECT * FROM users WHERE username = ?', $frm->getField('username')->getValue())){
			$frm->getField('username')->addError('Username is not available');
		}
	}
	
	// email is required
	$frm->getField('email')->isEmail('Please provide a valid email address.');
	
	// password is required
	if ($frm->getField('pass')->isFilled('Please choose a password') && $frm->getField('repeatPass')->isFilled('Please repeat your password')){
		// repeat pass must equal pass
		if ($frm->getField('pass')->getValue() != $frm->getField('repeatPass')->getValue()){
			$frm->getField('repeatPass')->addError('Does not equal first password.');
		} 
	};
	
	/*
	 * Validate the image. Following conditions apply:
	* - image is required
	* - image needs to be a jpeg, png or gif
	*/
	$image = $frm->getField('profilePic'); // just to shorten the code
	
	if($image->isFilled(''))
	{
		// image has the jpg/png extension
		$image->isAllowedExtension(array('jpg', 'png', 'gif'), 'Only jpg/gif are allowed.');
		$image->isFileName('Image name contains illegal characters.');
		if(!SpoonFilter::isMaximumCharacters(100, $image->getFileName())){
			$image->addError('Image name is too long');
		}
		
	}
	
	/*
	* The entire form was submitted correctly based on the iput validation
	* we did above.
	*/
	if($frm->isCorrect())
	{
		// all the information that was submitted
		$data = $frm->getValues();
		
		// add to database
		$record = array();
		
		$record['username'] = $data['username'];
		$record['firstname'] = $data['firstname'];
		$record['name'] = $data['name'];
		$record['password'] = md5($data['pass'] . SALT);
		$record['email'] = $data['email'];
		$record['member_since'] = date("Y/m/d");
		
		
		// profile picture
		if($image->isFilled('')){
			$image_name = preg_replace('/[^a-z0-9 .]/i', '_', $image->getFileName());
			
			if($image->createThumbnail( PROFILE_PIC_PATH . $image_name, PROFILE_PIC_WIDTH, PROFILE_PIC_HEIGHT)){
				$record['profile_picture'] = $image_name;
			} else{
				$image->addError('Profile picture could not be handled. Try again or contact Open Presentations staff');
			}
			
		}else{
			$record['profile_picture'] = 'default.png';
		}
		
		// check again for errors
		if($frm->isCorrect()){
			// write to db
			$db->insert('users', $record);
			header('Location:registerComplete.php');
		}
	}
}


// load template
$Main = new SpoonTemplate ();

// Compile options
$Main->setForceCompile ( COMPILE_TEMPLATES );
$Main->setCompileDirectory ( 'templates/compiled' );

// meta & css
$Main->assign('pageMeta', '');
$Main->assign('pageCss', '<link rel="stylesheet" type="text/css" media="screen" href="core/css/register.css" />');

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

// Form
$frmTpl = new SpoonTemplate();

// Compile options
$frmTpl->setForceCompile(COMPILE_TEMPLATES);
$frmTpl->setCompileDirectory('cache');

$frm->parse($frmTpl);
$Page->assign('frmRegister', $frmTpl->getContent('templates/forms/frmRegister.tpl'));

// show the output
$Main->assign ( 'pageContent', $Page->getContent ( 'templates/register.tpl' ) );
$Main->display ('templates/layout.tpl');

?>