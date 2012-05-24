<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php if(array_key_exists('title', (array) $this->variables)) { echo $this->variables['title']; } else { ?>{$title}<?php } ?></title> 
		<link rel="stylesheet" href="core/css/deck.js/liveFunctions.css" type="text/css"> 
		
		<script>
			var username = '<?php if(array_key_exists('username', (array) $this->variables)) { echo $this->variables['username']; } else { ?>{$username}<?php } ?>';
			var presentationID = '<?php if(array_key_exists('presentationID', (array) $this->variables)) { echo $this->variables['presentationID']; } else { ?>{$presentationID}<?php } ?>';
		</script>
		
		<script src="core/js/deck.js/jquery-1.7.min.js"></script>
		<script src="core/js/deck.js/liveFunctions.js"></script>
	</head>
	
	<body>
		<nav>
			<ul class="clearfix">
				<li>
					<a href="#">Chat</a>
				</li>
				<li>
					<a href="#">Audio</a>
				</li>
			</ul>
		</nav>
		<?php
					if(isset($this->variables['oChatbox']) && count($this->variables['oChatbox']) != 0 && $this->variables['oChatbox'] != '' && $this->variables['oChatbox'] !== false)
					{
						?>
		<section id="chatbox">
			
			<section id="content" class="overview"></section>
		
	        <section>
	            <span id="status">Connecting...</span>
	            <input type="text" id="input" disabled="disabled" />
	        </section>
	        
		</section>
		<?php } ?>
	</body>
	
</html>