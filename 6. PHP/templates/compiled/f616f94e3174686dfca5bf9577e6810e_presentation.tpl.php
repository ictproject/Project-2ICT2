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
	
	<!-- Modernizr -->
	<script src="core/js/deck.js/modernizr.custom.js"></script>
</head>
<body class="deck-container">

<?php
					if(!isset($this->variables['iSlides']))
					{
						?>{iteration:iSlides}<?php
						$this->variables['iSlides'] = array();
						$this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iSlides'})) $this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['old'] = ${'iSlides'};
				$this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['iteration'] = $this->variables['iSlides'];
				$this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['i'] = 1;
				$this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['count'] = count($this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['iteration'] as ${'iSlides'})
				{
					if(!isset(${'iSlides'}['first']) && $this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['i'] == 1) ${'iSlides'}['first'] = true;
					if(!isset(${'iSlides'}['last']) && $this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['i'] == $this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['count']) ${'iSlides'}['last'] = true;
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
		<div class="images"><img src="files/presentations/test/img/<?php if(array_key_exists('image', (array) ${'iSlides'})) { echo ${'iSlides'}['image']; } else { ?>{$iSlides->image}<?php } ?>"></div>
	<?php } ?>
	
	<?php
					if(isset(${'iSlides'}['videoSlide']) && count(${'iSlides'}['videoSlide']) != 0 && ${'iSlides'}['videoSlide'] != '' && ${'iSlides'}['videoSlide'] !== false)
					{
						?>
		<h3><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></h3>
		<video width="620" height="480" controls="controls">
	  		<source src="files/presentations/test/video/<?php if(array_key_exists('video', (array) ${'iSlides'})) { echo ${'iSlides'}['video']; } else { ?>{$iSlides->video}<?php } ?>" type="video/mp4" />
	  		Your browser does not support the video tag.
		</video>
	<?php } ?>
</section>

<?php
					$this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['fail']) && $this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iSlides}<?php
					}
				if(isset($this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['old'])) ${'iSlides'} = $this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']['old'];
				else unset($this->iterations['f616f94e3174686dfca5bf9577e6810e_presentation.tpl.php_1']);
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

<!-- Update these paths to point to the correct files. -->
<script src="core/js/deck.js/jquery-1.7.min.js"></script>
<script src="core/js/deck.js/deck.core.js"></script>

<!-- Add any other extension JS files here -->
<script src="core/js/deck.js/deck.goto.js"></script>
<script src="core/js/deck.js/deck.menu.js"></script>
<script src="core/js/deck.js/deck.hash.js"></script>

<!-- Initialize the deck. You can put this in an external file if desired. -->
<script>
	$(function() {
		$.deck('.slide');
	});
</script>
</body>
</html>
