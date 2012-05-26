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
//SpoonSession::set('username', 'Maxim');

// Username
$loggedIn = SpoonSession::exists ( 'username' );
if ($loggedIn) {
	$username = SpoonSession::get('username');
}

$UserID = SpoonFilter::getGetValue('id', null, '');
if($UserID === '') {
    $UserID = array();
    header ( 'Location: index.php');
}




// database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );





// load user info
$user = $db->getRecord('SELECT * FROM users WHERE id = ?', $UserID);
$userAdmin = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);

// load groupnames
$groups = $db->getRecords('SELECT g.name, g.id FROM openpresentations.groups AS g INNER JOIN openpresentations.users_has_groups AS u ON g.id = u.group_id WHERE  share="public" && u.user_id = ?', $UserID);

$userIsAdmin = false;

if($userAdmin['id'] == $user['id']) {
    $userIsAdmin = true;
    
}
if($userIsAdmin == false) {
    // load presentation names
    $presentations = $db->getRecords('SELECT  p.name, p.id  FROM presentations AS p INNER JOIN users AS u ON p.owner = u.id WHERE share != "private" && u.id = ?', $UserID);
}else {
    $presentations = $db->getRecords('SELECT  p.name, p.id  FROM presentations AS p INNER JOIN users AS u ON p.owner = u.id WHERE  u.id = ?', $UserID);
}


if($groups === null) {
    $groups = array();
}
if($presentations === null) {
    $presentations = array();
}
/*
 *Edit requests 
 * 
 */
//collect text box values
$record = array();
$txtName        = isset($_POST['txtName'])?$_POST['txtName']:"";
$txtFirstName   = isset($_POST['txtFirstName'])?$_POST['txtFirstName']:"";
$txtEmail       = isset($_POST['txtEmail'])?$_POST['txtEmail']:"";

// Form
$frm = new SpoonForm('frmEditProfilePic');
$frm->addButton('submit', 'Submit');
$frm->addImage('photo');

if($frm->isSubmitted()) {
   	/*
	 * Validate the image. Following conditions apply:
	* - image is required
	* - image needs to be a jpeg, png or gif
	*/

        //fileProfilePic	
	/*if($image->isFilled(''))
	{
		// image has the jpg/png extension
		$image->isAllowedExtension(array('jpg', 'png', 'gif'), 'Only jpg/gif are allowed.');
		$image->isFileName('Image name contains illegal characters.');
                
		if(!SpoonFilter::isMaximumCharacters(100, $image->getFileName())){
			$image->addError('Image name is too long');
		}
                $fileName = $image->getFileName();
		
	}*/
        $image = $frm->getField('photo'); //just to shorten the code
        // check image extension
        if($image->isAllowedExtension(array('jpg', 'png', 'gif'), 'Only jpg/gif/png are allowed.')) {
            // image is not bigger than 5MB
            if($image->isFilesize(5, 'mb', 'smaller', 'Too large. 5MB maximum')) {
                // dimensions are minium 50x50
                
                // move file
                $image->createThumbnail( USERS_PATH . $user['username'] . '/' . $image->getFileName(), PROFILE_PIC_WIDTH, PROFILE_PIC_HEIGHT);
                $record['profile_picture'] = $image->getFileName();
            }
        }
        if($frm->isCorrect()){ 
            // profile picture
            if($record != null) {
                $rows = $db->update('users', $record, 'id = ?', $user['id']);
            }
        }

}

 
//enter pressed update the database with the correct Title or/and description
if('POST' == $_SERVER['REQUEST_METHOD']) { 
    if($txtName != "") {
        $record['name'] = $txtName;    
    }
    if($txtFirstName != "") {
        $record['firstname'] = $txtFirstName;
    }
    if($txtEmail != "") {
        $record['email'] = $txtEmail; 
    }

    if($record != null) {
        $rows = $db->update('users', $record, 'id = ?', $user['id']);
        
        if(sizeof($rows)) {
            header ( 'Location: profile.php?id=' . $UserID);
        }
    } 

}

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
$Main->assign('pageMeta', '<script src="core/js/editToggleProfile.js" type="text/javascript"></script>');
$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/profile.css" />');

// user
$Main->assign('oLoggedIn', $loggedIn);
$Main->assign('username', $username);

if($user != null) {
    $Main->assign('user', $userAdmin);
}
/*
 * Page Template
 */
$Page = new SpoonTemplate ();

$Page->setForceCompile ( COMPILE_TEMPLATES );
$Page->setCompileDirectory ( 'templates/compiled' );



$Page->assign('oUserIsAdmin', $userIsAdmin);
// iterate presentations
$Page->assign('iPresentations', $presentations);
$Page->assign('user', $user);
// assign user info
$Page->assign('fullName', $user['firstname']. ' ' . $user['name']);
$Page->assign('email', $user['email']);
$Page->assign('memberSince', date("d F Y", strtotime($user['member_since']))); 

// assign img source
$Page->assign('imgSrc', 'files/users/' . $user['username'] . '/' . $user['profile_picture']);

// iterate groups
$Page->assign('iGroups', $groups);

// Form
$frmTpl = new SpoonTemplate();
// Compile options
$frmTpl->setForceCompile(COMPILE_TEMPLATES);
$frmTpl->setCompileDirectory('cache');

$frm->parse($frmTpl);
$Page->assign('frmEditProfilePic', $frmTpl->getContent('templates/forms/frmEditProfilePic.tpl'));


$Main->assign ( 'pageContent', $Page->getContent ( 'templates/profile.tpl' ) );

// show the output
$Main->display ('templates/layout.tpl');

?>