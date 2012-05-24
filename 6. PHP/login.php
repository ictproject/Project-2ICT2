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
$logged_in = SpoonSession::exists ( 'username' );
if ($logged_in) {
	$username = SpoonSession::get('username');
}
// Check cookie
$cookie = false;
if (SpoonCookie::exists ( 'username', 'password' )) {
	$username = SpoonCookie::get('username');
	$password = SpoonCookie::get('password');
	$cookie = true;
        var_dump($username);
}
// Database connection
$db = new SpoonDatabase ( DB_DRIVER, DB_HOST, DB_USER, DB_PASS, DB_NAME );

//form login
$frmLogin = new SpoonForm('frmLogin');

$frmLogin->addText('username');
$frmLogin->addPassword('password');
$frmLogin->addButton('login', 'Login');
$frmLogin->addCheckbox('saveUser', false);

if($frmLogin->isSubmitted()) {
    $username = SpoonFilter::getPostValue('username',null,'');
    $password = SpoonFilter::getPostValue('password',null,'');
   
    if($password == ''){
        $frmLogin->getField('password')->isFilled(' Please fill in your password');
    }
    if($username =='') {
        $frmLogin->getField('username')->isFilled(' Please fill in your username');
    }
    
    if($username != '' && $password != '') {
        
        
	$correct_password = $db->getRecord ( 'SELECT password FROM users WHERE username = ?', $username );
        
        if ($correct_password != null) {

            // if not from cookie -> md5 password
            if (! $cookie) $password =  md5(md5($password ). SALT);
            
            if ($password == md5($correct_password ['password'] . SALT)) {
                
                    // correct
                    SpoonSession::start ();
                    SpoonSession::set ( 'username', $username );
                    // remember cookie
                    if ($remember_me) {
                            
                            SpoonCookie::set ( 'username', $username );
                            SpoonCookie::set ( 'password', md5($correct_password['password'] . SALT), 30 * 24 * 60 * 60  );
                    }
                    header ( 'Location: index.php' );
            } else {
                    $frmLogin->getField('password')->addError(' Wrong password');
            }
        } else {
                $frmLogin->getField('username')->addError(' Wrong username');
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
$Main->assign('pageCss',     '<link rel="stylesheet" type="text/css" media="screen" href="core/css/register.css" />');

// user
$Main->assign('oLoggedIn', $logged_in);


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

$frmLogin->parse($frmTpl);
$Page->assign('frmLogin', $frmTpl->getContent('templates/forms/frmLogin.tpl'));


// show the output
$Main->assign ( 'pageContent', $Page->getContent ( 'templates/login.tpl' ) );
$Main->display ('templates/layout.tpl');

?>
