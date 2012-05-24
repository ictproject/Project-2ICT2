<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{$title}</title>
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

{iteration:iSlides}
<section class="slide" id="slide_{$iSlides.title}">
	{option:iSlides.titleSlide}
		<h1>{$iSlides.title}</h1>
		<h2>{$iSlides.subtitle}</h2>
	{/option:iSlides.titleSlide}

	{option:iSlides.contentSlide}
		<h3>{$iSlides.title}</h3>
		<div class="text">{$iSlides.content}</div>
	{/option:iSlides.contentSlide}
	
	{option:iSlides.imageSlide}
		<h3>{$iSlides.title}</h3>
		<div class="images"><img src="files/presentations/test/img/{$iSlides.image}"></div>
	{/option:iSlides.imageSlide}
	
	{option:iSlides.videoSlide}
		<h3>{$iSlides.title}</h3>
		<video width="620" height="480" controls="controls">
	  		<source src="files/presentations/test/video/{$iSlides.video}" type="video/mp4" />
	  		Your browser does not support the video tag.
		</video>
	{/option:iSlides.videoSlide}
</section>

{/iteration:iSlides}


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
