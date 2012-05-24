<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
  <title> Open Presentations </title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
  <link rel="stylesheet" type="text/css" href="core/css/library.css" />
  <link rel="stylesheet" type="text/css" href="core/css/styles.css" />
  <link rel="shortcut icon" href="core/images/favicon.ico">
    {$pageCss}
	
	{$pageMeta}

</head>
<body>
	<div id="headerWrapper">
		<div id="header">
		  <h1><a href="index.php">Open Presentations</a></h1>
		  <p id="register">
                       {option:oLoggedIn}<a href="Logout.php">Logout</a>{/option:oLoggedIn} 
                       {option:!oLoggedIn}<a href="register.php">Register Now</a>{/option:!oLoggedIn}
                  </p>
		  <h2>Web-based live presentations</h2>
		</div>
	</div>

	<div id="background">
	  <div id="wrapper">

		<div id="menu">
		  <ul>
            {option:!oLoggedIn}
            <li><a href="index.php">Home</a></li>
            <li class="last"><a href="about.php">About Open Presentations</a></li>
            {/option:!oLoggedIn}
    	      
            {option:oLoggedIn}
            <li><a href="myPresentations.php">My Presentations</a></li>
            <li><a href="createPresentation.php">Create Presentation</a></li>
            <li><a href="editGroups.php">Groups</a></li>
            
            <li class="last"><a href="about.php">About Open Presentations</a></li>
		    {/option:oLoggedIn}
			
			<li id="login">
				{option:oLoggedIn}<a href="profile.php?id={$user.id}">{$username}</a>{/option:oLoggedIn}
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
