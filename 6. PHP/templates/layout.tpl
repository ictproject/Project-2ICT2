<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
  <title> Open Presentations </title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
  <link rel="stylesheet" type="text/css" href="core/css/library.css" />
  <link rel="stylesheet" type="text/css" href="core/css/styles.css" />
    {$pageCss}
	
	{$pageMeta}

</head>
<body>
	<div id="headerWrapper">
		<div id="header">
		  <h1><a href="index.php">Open Presentations</a></h1>
		  <p id="register"><a href="register.php">Register Now</a></p>
		  <h2>Web-based live presentations</h2>
		</div>
	</div>

	<div id="background">
	  <div id="wrapper">

		<div id="menu">
		  <ul>
			<li><a href="myPresentations.php">My Presentations</a></li>
			<li id="middle"><a href="createPresentation.php">Create Presentation</a></li>
			<li><a href="about.php">About Open Presentations</a></li>
			<li id="login">
				{option:oLoggedIn}<a href="profile.php">{$username}</a>{/option:oLoggedIn}
				{option:!oLoggedIn}<a href="login.php">Login</a>{/option:!oLoggedIn}
			</li>
		  </ul>
		</div>

		<div id="content">

                    {$pageContent}

		</div>
	  </div>
	<div id="footer">
	  <p>&copy; Copyright 2012</p>
	  <p>Henri George, Maxim Maes, Thomas Vandermarliere</p>
	</div>
</body>
</html>