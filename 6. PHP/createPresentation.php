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

// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);

// Form
$frm = new SpoonForm('frmCreatePresentation');

$frm->setParameter('class', 'clearfix');

$frm->addText('name');
$frm->addCheckbox('public', false);

$frm->addButton('submit', 'next');


// Form handler

if($frm->isSubmitted())
{
        // name is required
	$frm->getField('name')->isFilled('Please fill out a name for the presentation');
        
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
            $db->insert('presentations', $presentation);
            
            // get presentation id
            $Pid = $db->getVar('SELECT MAX(id) FROM presentations');
            
            // create folder for te presentation
            mkdir('files/users/' . $username . '/presentations/' . $Pid . '.' . $presentation['name']);
            
            // redirecten naar slide editor
            header('Location: slideEditor.php?Pid=' . $Pid);
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
$Page->assign('frmCreatePresentation', $frmTpl->getContent('templates/forms/frmCreatePresentation.tpl'));

// show the output
$Main->assign ( 'pageContent', $Page->getContent ( 'templates/createPresentation.tpl' ) );
$Main->display ('templates/layout.tpl');

?>