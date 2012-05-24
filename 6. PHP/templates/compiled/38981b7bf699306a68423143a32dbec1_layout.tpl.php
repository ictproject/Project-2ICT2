<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
  <title> Open Presentations </title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
  <link rel="stylesheet" type="text/css" href="core/css/library.css" />
  <link rel="stylesheet" type="text/css" href="core/css/styles.css" />
  <link rel="shortcut icon" href="core/images/favicon.ico">
    <?php if(array_key_exists('pageCss', (array) $this->variables)) { echo $this->variables['pageCss']; } else { ?>{$pageCss}<?php } ?>
	
	<?php if(array_key_exists('pageMeta', (array) $this->variables)) { echo $this->variables['pageMeta']; } else { ?>{$pageMeta}<?php } ?>

</head>
<body>
	<div id="headerWrapper">
		<div id="header">
		  <h1><a href="index.php">Open Presentations</a></h1>
		  <p id="register">
                       <?php
					if(isset($this->variables['oLoggedIn']) && count($this->variables['oLoggedIn']) != 0 && $this->variables['oLoggedIn'] != '' && $this->variables['oLoggedIn'] !== false)
					{
						?><a href="Logout.php">Logout</a><?php } ?> 
                       <?php if(!isset($this->variables['oLoggedIn']) || count($this->variables['oLoggedIn']) == 0 || $this->variables['oLoggedIn'] == '' || $this->variables['oLoggedIn'] === false): ?><a href="register.php">Register Now</a><?php endif; ?>
                  </p>
		  <h2>Web-based live presentations</h2>
		</div>
	</div>

	<div id="background">
	  <div id="wrapper">

		<div id="menu">
		  <ul>
            <?php if(!isset($this->variables['oLoggedIn']) || count($this->variables['oLoggedIn']) == 0 || $this->variables['oLoggedIn'] == '' || $this->variables['oLoggedIn'] === false): ?>
            <li><a href="index.php">Home</a></li>
            <li class="last"><a href="about.php">About Open Presentations</a></li>
            <?php endif; ?>
    	      
            <?php
					if(isset($this->variables['oLoggedIn']) && count($this->variables['oLoggedIn']) != 0 && $this->variables['oLoggedIn'] != '' && $this->variables['oLoggedIn'] !== false)
					{
						?>
            <li><a href="myPresentations.php">My Presentations</a></li>
            <li><a href="createPresentation.php">Create Presentation</a></li>
            <li><a href="editGroups.php">Groups</a></li>
            
            <li class="last"><a href="about.php">About Open Presentations</a></li>
		    <?php } ?>
			
			<li id="login">
				<?php
					if(isset($this->variables['oLoggedIn']) && count($this->variables['oLoggedIn']) != 0 && $this->variables['oLoggedIn'] != '' && $this->variables['oLoggedIn'] !== false)
					{
						?><a href="profile.php?id=<?php if(isset($this->variables['user']) && array_key_exists('id', (array) $this->variables['user'])) { echo $this->variables['user']['id']; } else { ?>{$user.id}<?php } ?>"><?php if(array_key_exists('username', (array) $this->variables)) { echo $this->variables['username']; } else { ?>{$username}<?php } ?></a><?php } ?>
				<?php if(!isset($this->variables['oLoggedIn']) || count($this->variables['oLoggedIn']) == 0 || $this->variables['oLoggedIn'] == '' || $this->variables['oLoggedIn'] === false): ?><a href="login.php">Login</a><?php endif; ?>
			</li>
		  </ul>
		</div>

		<div id="content">

                    <?php if(array_key_exists('pageContent', (array) $this->variables)) { echo $this->variables['pageContent']; } else { ?>{$pageContent}<?php } ?>

		</div>
	  </div>
	<div id="footer">
	  <p>&copy; Copyright 2012</p>
	  <p>Henri George, Maxim Maes, Thomas Vandermarliere</p>
	</div>
</body>
</html>
