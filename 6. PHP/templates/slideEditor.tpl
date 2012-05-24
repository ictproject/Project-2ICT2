<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
    <title> Open Presentations </title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
    <link rel="stylesheet" type="text/css" href="core/css/library.css" />
    <link rel="stylesheet" type="text/css" href="core/css/slideEditor.css" />
    <script type="text/javascript" src="core/js/confirmbox.js"></script>
    <script type="text/javascript" src="core/js/scrollbar/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="core/js/scrollbar/jquery.tinyscrollbar.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                    $('#scroll').tinyscrollbar({ axis: 'x'});
                    $('#contentTitle').keyup(function() {
                        $('#title').text($('#contentTitle').val());
                    });
                    $('#contentSubtitle').keyup(function() {
                        $('#subtitle').text($('#contentSubtitle').val());
                    });
                    $('#contentText').keyup(function() {
                        $('#text').text($('#contentText').val());
                    });
            });
    </script>	
</head>
<body>
  <div id="headerWrapper">
	<div id="header">
	  <h1><a href="index.php">Open Presentations</a></h1>
	  <h2>Slide editor</h2>
	  <p id="exit"><a href="myPresentations.php">Presentations</a></p>
	</div>
  </div>

	<div id="wrapper">
		<div id="content">
			<h3>Templates</h3>

			<div id="templates">
				<div class="selected slide title" onclick="location.href='{$self}&template=title';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p class="subtitle">Subtitle</p>
				</div>

				<div class="slide text" onclick="location.href='{$self}&template=content';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p class="sampleText">Sample text</p>
				</div>

				<div class="slide image" onclick="location.href='{$self}&template=image';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p><img src="core/img/templateImg.png" width="99" height="69" alt="img"/></p>
				</div>

				<div class="slide video" onclick="location.href='{$self}&template=video';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p><img src="core/img/templateVideo.png" width="99" height="61" alt="video"/></p>
				</div>

				<p class="templateNames">Title + subtitle</p>
				<p class="templateNames">Title + text</p>
				<p class="templateNames">Title + image</p>
				<p class="templateNames">Title + video</p>
			</div>

                        {option:oDeleted}
                        <div id="msg">
                            <p>Slide Nr.{$deleted} was succesfully deleted.</p>
                        </div>
                        {/option:oDeleted}

			<div id="bigSlide">
                        {option:oTitle}
				<p id="title" class="big">{$title}</p>
				<p id="subtitle">{$subtitle}</p>
                        {/option:oTitle}
                        {option:oContent}
				<p id="title">{$title}</p>
				<p id="text">{$text}</p>
                        {/option:oContent}
                        {option:oImage}
				<p id="title">{$title}</p>
                                <p id="image"><img src="{$img}"></p>
                        {/option:oImage}
                        {option:oVideo}
				<p id="title">{$title}</p>
                                <video id="vid" src="{$vid}" controls autobuffer>
                        {/option:oVideo}
			</div>

			{$frmEdit}

    		<p id="delSlide" class="add"><a href="{$self}&delete={$nr}" onclick="confirmation()">Delete slide</a></p>
    		<p id="addSlide" class="add"><a href="#" onclick="document.forms[0].submit()">Add slide</a></p>

    		<h3>Slides</h3>

			<div id="scroll" class="clearfix">
                                <div class="viewport clearfix">
                                    <div class="overview clearfix">
                                        {iteration:iSlides}  
                                            <div class="slide {$iSlides.template}" onclick="location.href='{$self}&template={$iSlides.template}&nr={$iSlides.nr}'" style="cursor:pointer;">
                                            {option:iSlides.oTitle}
                                                        <p class="title">{$iSlides.title}</p>
                                                        <p class="subtitle">{$iSlides.subtitle}</p>
                                            {/option:iSlides.oTitle}
                                            {option:iSlides.oContent}
                                                        <p class="title">{$iSlides.title}</p>
                                                        <p class="sampleText">{$iSlides.text}</p>
                                            {/option:iSlides.oContent}
                                            {option:iSlides.oImage}
                                                        <p class="title">{$iSlides.title}</p>
                                                        <p><img src="{$iSlides.imgSrc}" width="99" height="69" alt="img"/></p>
                                            {/option:iSlides.oImage}
                                            {option:iSlides.oVideo}                             
                                                        <p class="title">{$iSlides.title}</p>
                                                        <p><img src="core/img/templateVideo.png" width="99" height="61" alt="video"/></p>
                                            {/option:iSlides.oVideo}  
                                            </div>
                                        {/iteration:iSlides}
                                    </div>                        
                              </div>       
                              <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
			</div>
		</div>
	  </div>
</body>
</html>