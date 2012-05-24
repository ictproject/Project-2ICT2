<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php if(array_key_exists('title', (array) $this->variables)) { echo $this->variables['title']; } else { ?>{$title}<?php } ?></title>
	<meta name="viewport" content="width=1024, user-scalable=no">
	
	<!-- Styles -->
	
	<link rel="stylesheet" href="core/css/deck.js/web-2.0.css" type="text/css"> 
	<link rel="stylesheet" href="core/css/deck.js/horizontal-slide.css" type="text/css"> 
	<link rel="stylesheet" href="core/css/deck.js/deck.goto.css" type="text/css"> 
	<link rel="stylesheet" href="core/css/deck.js/deck.menu.css" type="text/css"> 
	<link rel="stylesheet" href="core/css/deck.js/deck.hash.css" type="text/css"> 
	<link rel="stylesheet" href="core/css/deck.js/deck.status.css" type="text/css"> 
	
	<!-- Modernizr -->
	<script src="core/js/deck.js/modernizr.custom.js"></script>
</head>
<body class="deck-container">
	<?php
					if(isset($this->variables['oLive']) && count($this->variables['oLive']) != 0 && $this->variables['oLive'] != '' && $this->variables['oLive'] !== false)
					{
						?><a href="#" id="live_function" onclick="openLiveFunctions()">Live functions</a><?php } ?>
	<?php
					if(isset($this->variables['oAdmin']) && count($this->variables['oAdmin']) != 0 && $this->variables['oAdmin'] != '' && $this->variables['oAdmin'] !== false)
					{
						?><?php if(!isset($this->variables['oLive']) || count($this->variables['oLive']) == 0 || $this->variables['oLive'] == '' || $this->variables['oLive'] === false): ?><a href="presentation.php?live=<?php if(array_key_exists('presentationID', (array) $this->variables)) { echo $this->variables['presentationID']; } else { ?>{$presentationID}<?php } ?>" id="live_function">Go Live</a><?php endif; ?><?php } ?>

	<?php
					if(!isset($this->variables['iSlides']))
					{
						?>{iteration:iSlides}<?php
						$this->variables['iSlides'] = array();
						$this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iSlides'})) $this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['old'] = ${'iSlides'};
				$this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['iteration'] = $this->variables['iSlides'];
				$this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['i'] = 1;
				$this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['count'] = count($this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['iteration'] as ${'iSlides'})
				{
					if(!isset(${'iSlides'}['first']) && $this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['i'] == 1) ${'iSlides'}['first'] = true;
					if(!isset(${'iSlides'}['last']) && $this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['i'] == $this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['count']) ${'iSlides'}['last'] = true;
					if(isset(${'iSlides'}['formElements']) && is_array(${'iSlides'}['formElements']))
					{
						foreach(${'iSlides'}['formElements'] as $name => $object)
						{
							${'iSlides'}[$name] = $object->parse();
							${'iSlides'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
	<section class="slide" id="slide_<?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?>">
		<?php
					if(isset(${'iSlides'}['titleSlide']) && count(${'iSlides'}['titleSlide']) != 0 && ${'iSlides'}['titleSlide'] != '' && ${'iSlides'}['titleSlide'] !== false)
					{
						?>
			<h1><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></h1>
			<h2><?php if(array_key_exists('subtitle', (array) ${'iSlides'})) { echo ${'iSlides'}['subtitle']; } else { ?>{$iSlides->subtitle}<?php } ?></h2>
		<?php } ?>
	
		<?php
					if(isset(${'iSlides'}['contentSlide']) && count(${'iSlides'}['contentSlide']) != 0 && ${'iSlides'}['contentSlide'] != '' && ${'iSlides'}['contentSlide'] !== false)
					{
						?>
			<h3><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></h3>
			<div class="text"><?php if(array_key_exists('content', (array) ${'iSlides'})) { echo ${'iSlides'}['content']; } else { ?>{$iSlides->content}<?php } ?></div>
		<?php } ?>
		
		<?php
					if(isset(${'iSlides'}['imageSlide']) && count(${'iSlides'}['imageSlide']) != 0 && ${'iSlides'}['imageSlide'] != '' && ${'iSlides'}['imageSlide'] !== false)
					{
						?>
			<h3><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></h3>
			<div class="images"><img src="<?php if(array_key_exists('image', (array) ${'iSlides'})) { echo ${'iSlides'}['image']; } else { ?>{$iSlides->image}<?php } ?>"></div>
		<?php } ?>
		
		<?php
					if(isset(${'iSlides'}['videoSlide']) && count(${'iSlides'}['videoSlide']) != 0 && ${'iSlides'}['videoSlide'] != '' && ${'iSlides'}['videoSlide'] !== false)
					{
						?>
			<h3><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></h3>
			<video width="620" height="480" controls="controls">
		  		<source src="<?php if(array_key_exists('video', (array) ${'iSlides'})) { echo ${'iSlides'}['video']; } else { ?>{$iSlides->video}<?php } ?>" type="video/webm" />
		  		Your browser does not support the video tag.
			</video>
		<?php } ?>
	</section>
	
	<?php
					$this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['fail']) && $this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iSlides}<?php
					}
				if(isset($this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['old'])) ${'iSlides'} = $this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']['old'];
				else unset($this->iterations['87b4fd994bde8a03439249fe1031065b_presentation.tpl.php_1']);
				?>
	
	
	<!-- Other extension HTML snippets go here, at the bottom of the deck container. -->
	<!-- Place the following snippet at the bottom of the deck container. -->
	<!-- goto extenstion -->
	<form action="." method="get" class="goto-form">
		<label for="goto-slide">Go to slide:</label>
		<input type="text" name="slidenum" id="goto-slide" list="goto-datalist">
		<datalist id="goto-datalist"></datalist>
		<input type="submit" value="Go">
	</form>
	<!-- hash extenstion -->
	<a href="." title="Permalink to this slide" class="deck-permalink">#</a>
	
	<!-- status extension -->
	<p class="deck-status">
		<span class="deck-status-current"></span>
		/
		<span class="deck-status-total"></span>
	</p>
	
	<script src="core/js/deck.js/jquery-1.7.min.js"></script>
	<?php
					if(isset($this->variables['oLive']) && count($this->variables['oLive']) != 0 && $this->variables['oLive'] != '' && $this->variables['oLive'] !== false)
					{
						?>
    	<?php
					if(isset($this->variables['oAdmin']) && count($this->variables['oAdmin']) != 0 && $this->variables['oAdmin'] != '' && $this->variables['oAdmin'] !== false)
					{
						?>
           <script src="core/js/deck.js/frontend.admin.node.js"></script>
           <script src="core/js/deck.js/deck.admin.core.js"></script>
           <script src="core/js/deck.js/deck.goto.js"></script>
           <script src="core/js/deck.js/deck.menu.js"></script>
           <script src="core/js/deck.js/deck.hash.js"></script>
        <?php } ?>
        
        <?php if(!isset($this->variables['oAdmin']) || count($this->variables['oAdmin']) == 0 || $this->variables['oAdmin'] == '' || $this->variables['oAdmin'] === false): ?>
           <script src="core/js/deck.js/frontend.node.js"></script>
           <script src="core/js/deck.js/deck.core.js"></script>
        <?php endif; ?>
	<?php } ?>
	
	<?php if(!isset($this->variables['oLive']) || count($this->variables['oLive']) == 0 || $this->variables['oLive'] == '' || $this->variables['oLive'] === false): ?>
	       <script src="core/js/deck.js/deck.admin.core.js"></script>
           <script src="core/js/deck.js/deck.goto.js"></script>
           <script src="core/js/deck.js/deck.menu.js"></script>
           <script src="core/js/deck.js/deck.hash.js"></script>
	<?php endif; ?>
	
	<!-- Add any other extension JS files here -->
	<script src="core/js/deck.js/deck.status.js"></script>
	
	<?php
					if(isset($this->variables['oLive']) && count($this->variables['oLive']) != 0 && $this->variables['oLive'] != '' && $this->variables['oLive'] !== false)
					{
						?>
	<!-- live functions -->
	<script src="core/js/deck.js/liveFunctionsPopup.js"></script>
	<?php } ?>
	<!-- Initialize the deck. You can put this in an external file if desired. -->
	<script>
	<?php
					if(isset($this->variables['oLive']) && count($this->variables['oLive']) != 0 && $this->variables['oLive'] != '' && $this->variables['oLive'] !== false)
					{
						?>
		var sessionID = '<?php if(array_key_exists('sessionID', (array) $this->variables)) { echo $this->variables['sessionID']; } else { ?>{$sessionID}<?php } ?>';
		var presentationID = '<?php if(array_key_exists('presentationID', (array) $this->variables)) { echo $this->variables['presentationID']; } else { ?>{$presentationID}<?php } ?>';
		var nodeServer = '<?php if(array_key_exists('nodeServer', (array) $this->variables)) { echo $this->variables['nodeServer']; } else { ?>{$nodeServer}<?php } ?>';
	<?php } ?>
		$(function() {
			$.deck('.slide');
		});
		
		/* set deck-container width & heigth  */
		
		function presentationResize() {  
			$('.deck-container').width(window.innerWidth - 100 + "px");
			$('.deck-container').height(window.innerHeight - 100 + "px");
		}  
		
		presentationResize();//Triggers when document first loads      
		  
		 $(window).bind("resize", function(){ presentationResize();});  
	</script>
</body>
</html>
