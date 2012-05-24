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

<section class="slide" id="slide_start">
	<h1>Title Template</h1>
	<h2>Subtitle</h2>
</section>

<section class="slide" id="slide_intro">
	<h3>Text Template</h3>
	<p>text</p>
</section>

<section class="slide" id="slide_c#">
	<h3>Image Template</h3>
	<div class="images"><img src="files/presentations/test/img/test.jpg" /></div>
</section>

<section class="slide" id="slide_linux">
	<h3>Video Template</h3>
	<video width="320" height="240" controls="controls">
  		<source src="files/presentations/test/video/movie.mp4" type="video/mp4" />
  		<source src="files/presentations/test/video/movie.ogg" type="video/ogg" />
  		Your browser does not support the video tag.
	</video> 	
</section>
	
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
