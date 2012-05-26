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

// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

// load user info
$user = $db->getRecord('SELECT * FROM users WHERE username = ?', $username);

// Form
$frm = new SpoonForm('frmCreateGroup');

$frm->setParameter('class', 'clearfix');

$frm->addText('name');
$frm->addTextarea('description');
$frm->addCheckbox('public', false);

$frm->addButton('submit', 'Finish');


// Form handler

if($frm->isSubmitted())
{
        // name is required
	$frm->getField('name')->isFilled('Please fill out a name for the group');
        
        if($frm->isCorrect())
	{
            // all the information that was submitted
            $data = $frm->getValues();

            // insert data in the DB
            $group = array();
            $group['name'] = $data['name'];
            $group['description'] = $data['description'];
            if ($data['public'])
            { 
                $group['share'] = 'public'; 
                
            } 
            else 
            { 
                $group['share'] = 'private'; 
                
            }
            $group['admin'] = $user['id'];
            $db->insert('groups', $group);
            
            //latest record id from groups --> to update users_has_groups table
            $GroupID = $db->getRecord('SELECT * FROM groups WHERE ID = (SELECT MAX(id)  FROM groups)');
            
            //also add the admin to the user_has_group 
            //group_id and user_id needed
            $user_has_groups = array();
            //$user_has_groups['group_id'] = ;
            $user_has_groups['user_id'] = $user['id'];
            $user_has_groups['group_id'] = $GroupID['id'];
            
            $db->insert('users_has_groups', $user_has_groups);
            

            header('Location:createGroupComplete.php');
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
$Page->assign('frmCreateGroup', $frmTpl->getContent('templates/forms/frmCreateGroup.tpl'));

// show the output
$Main->assign ( 'pageContent', $Page->getContent ( 'templates/createGroup.tpl' ) );
$Main->display ('templates/layout.tpl');

?>