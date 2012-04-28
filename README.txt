Todo

Templates php:  
- Index (henri)
- login (henri)
- register (thomas)
- my presentations (maxim)

Html & css: Slide editor (maxim)

Login php voorbeeld:

// Login check
if (SpoonSession::exists ( 'username' )) {
	header ( 'Location: adminHome.php' );
}

// Check cookie
$cookie = false;
if (SpoonCookie::exists ( 'username', 'password' )) {
	$username = SpoonCookie::get('username');
	$password = SpoonCookie::get('password');
	$cookie = true;
}

// Form handler
if (SpoonFilter::getPostValue ( 'btnSubmit', null, '' ) == 'Login') {
	
	if ($username != '' && $password != '') {
		$username = @mysql_real_escape_string ( $username );
		$correct_password = $db->getRecord ( 'SELECT password FROM user WHERE username = ?', $username );
		if ($correct_password != null) {
			// if not from cookie -> md5 password
			if (! $cookie) $password = md5(md5 ( $password ) . SALT);
			if ($password == md5($correct_password ['password'] . SALT)) {
				// correct
				SpoonSession::start ();
 				SpoonSession::set ( 'username', $username );
				// remember cookie
				if ($remember_me) {
					SpoonCookie::set ( 'username', $username );
					SpoonCookie::set ( 'password', md5($correct_password ['password'] . SALT), 30 * 24 * 60 * 60 );
				}
				header ( 'Location: adminHome.php' );
			} else {
				$form_errors [] = array ('message' => 'Paswoord is niet correct' );
			}
		} else {
			$form_errors [] = array ('message' => 'Gebruikersnaam is niet correct' );
		}
	} else {
		$form_errors [] = array ('message' => 'Niet alle velden zijn volledig ingevuld.' );
	}
}