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

// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );
// database connection
$OwnerEditPage = false;



//load only groups where the user is admin
$createdGroups = $db->getPairs('SELECT g.id,g.name FROM openpresentations.groups AS g INNER JOIN openpresentations.users AS u ON g.admin = u.id WHERE u.username= ?',$username);
// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);
$PresentationID = SpoonFilter::getGetValue('Pid', null, '');

if($PresentationID == '') {
    $PresentationID = array();
    header('Location: index.php');
    
} else {
    $presentation = $db->getRecord('SELECT * FROM presentations WHERE presentations.id = ?', $PresentationID);
    if(($user['id'] != $presentation['owner'])) {
        header('Location: index.php');
    }
}
$GroupName = $db->getRecord('SELECT * FROM presentations WHERE presentations.id = ?', $PresentationID);

// Form
$frm = new SpoonForm('frmCreatePresentationEdit');

$frm->setParameter('class', 'clearfix');

$frm->addText('name',$presentation['name']);

$checkboxValue = true;
if($presentation['share'] == 'private') {
    $checkboxValue = false;
}
$frm->addCheckbox('public', $checkboxValue);

array_unshift($createdGroups,'');

$frm->addDropdown('Groups', $createdGroups);

$frm->addButton('submit', 'Update');

// Form handler
if($frm->isSubmitted())
{
        // name is required
	$frm->getField('name')->isFilled('Please fill out a name for the presentation');
        // country is required
        $frm->getField('Groups')->isFilled('Please select a group or nothing.');
        
        if($frm->isCorrect())
	{
            // all the information that was submitted
            $data = $frm->getValues();
            
            // insert data in the DB
            $presentation = array();
            $presentation['name'] = $data['name'];
            if ($data['public'])
            { 
                $presentation['share'] = 'public'; 
                
            } 
            else 
            { 
                $presentation['share'] = 'private'; 
                
            }
            $presentation['owner'] = $user['id'];
            if($data['Groups'] != 0) {
                $GroupName = $createdGroups[$data['Groups']];
                $groupID = $db->getVar('SELECT id FROM groups WHERE name = ?', $GroupName);
                $presentation['groups_id'] = $groupID;
                
            }
            
            $db->update('presentations', $presentation, 'id = ?', $PresentationID);

            // redirecten naar slide editor
            header('Location: myPresentations.php');
	}
}

// load template
$Main = new SpoonTemplate ();

// Compile options
$Main->setForceCompile ( COMPILE_TEMPLATES );
$Main->setCompileDirectory ( 'templates/compiled' );

// meta & css
$Main->assign('pageMeta', '');
$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/createPresentation.css" />');

// user
$Main->assign('oLoggedIn', $loggedIn);
$Main->assign('username', $username);
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

// Form
$frmTpl = new SpoonTemplate();

// Compile options
$frmTpl->setForceCompile(COMPILE_TEMPLATES);
$frmTpl->setCompileDirectory('cache');

$frm->parse($frmTpl);
$Page->assign('frmCreatePresentationEdit', $frmTpl->getContent('templates/forms/frmCreatePresentationEdit.tpl'));

// show the output
$Main->assign ( 'pageContent', $Page->getContent ( 'templates/createPresentationEdit.tpl' ) );
$Main->display ('templates/layout.tpl');

?>