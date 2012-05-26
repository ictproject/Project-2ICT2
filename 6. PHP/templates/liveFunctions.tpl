<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{$title}</title> 
		<link rel="stylesheet" href="core/css/deck.js/liveFunctions.css" type="text/css"> 
		
		<script>
			var username = '{$username}';
			var presentationID = '{$presentationID}';
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
		{option:oChatbox}
		<section id="chatbox">
			
			<section id="content" class="overview"></section>
		
	        <section>
	            <span id="status">Connecting...</span>
	            <input type="text" id="input" disabled="disabled" />
	        </section>
	        
		</section>
		{/option:oChatbox}
	</body>
	
</html>