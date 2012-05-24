<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
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
				<div class="selected slide title" onclick="location.href='<?php if(array_key_exists('self', (array) $this->variables)) { echo $this->variables['self']; } else { ?>{$self}<?php } ?>&template=title';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p class="subtitle">Subtitle</p>
				</div>

				<div class="slide text" onclick="location.href='<?php if(array_key_exists('self', (array) $this->variables)) { echo $this->variables['self']; } else { ?>{$self}<?php } ?>&template=content';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p class="sampleText">Sample text</p>
				</div>

				<div class="slide image" onclick="location.href='<?php if(array_key_exists('self', (array) $this->variables)) { echo $this->variables['self']; } else { ?>{$self}<?php } ?>&template=image';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p><img src="core/img/templateImg.png" width="99" height="69" alt="img"/></p>
				</div>

				<div class="slide video" onclick="location.href='<?php if(array_key_exists('self', (array) $this->variables)) { echo $this->variables['self']; } else { ?>{$self}<?php } ?>&template=video';" style="cursor:pointer;">
					<p class="title">Title</p>
					<p><img src="core/img/templateVideo.png" width="99" height="61" alt="video"/></p>
				</div>

				<p class="templateNames">Title + subtitle</p>
				<p class="templateNames">Title + text</p>
				<p class="templateNames">Title + image</p>
				<p class="templateNames">Title + video</p>
			</div>

                        <?php
					if(isset($this->variables['oDeleted']) && count($this->variables['oDeleted']) != 0 && $this->variables['oDeleted'] != '' && $this->variables['oDeleted'] !== false)
					{
						?>
                        <div id="msg">
                            <p>Slide Nr.<?php if(array_key_exists('deleted', (array) $this->variables)) { echo $this->variables['deleted']; } else { ?>{$deleted}<?php } ?> was succesfully deleted.</p>
                        </div>
                        <?php } ?>

			<div id="bigSlide">
                        <?php
					if(isset($this->variables['oTitle']) && count($this->variables['oTitle']) != 0 && $this->variables['oTitle'] != '' && $this->variables['oTitle'] !== false)
					{
						?>
				<p id="title" class="big"><?php if(array_key_exists('title', (array) $this->variables)) { echo $this->variables['title']; } else { ?>{$title}<?php } ?></p>
				<p id="subtitle"><?php if(array_key_exists('subtitle', (array) $this->variables)) { echo $this->variables['subtitle']; } else { ?>{$subtitle}<?php } ?></p>
                        <?php } ?>
                        <?php
					if(isset($this->variables['oContent']) && count($this->variables['oContent']) != 0 && $this->variables['oContent'] != '' && $this->variables['oContent'] !== false)
					{
						?>
				<p id="title"><?php if(array_key_exists('title', (array) $this->variables)) { echo $this->variables['title']; } else { ?>{$title}<?php } ?></p>
				<p id="text"><?php if(array_key_exists('text', (array) $this->variables)) { echo $this->variables['text']; } else { ?>{$text}<?php } ?></p>
                        <?php } ?>
                        <?php
					if(isset($this->variables['oImage']) && count($this->variables['oImage']) != 0 && $this->variables['oImage'] != '' && $this->variables['oImage'] !== false)
					{
						?>
				<p id="title"><?php if(array_key_exists('title', (array) $this->variables)) { echo $this->variables['title']; } else { ?>{$title}<?php } ?></p>
                                <p id="image"><img src="<?php if(array_key_exists('img', (array) $this->variables)) { echo $this->variables['img']; } else { ?>{$img}<?php } ?>"></p>
                        <?php } ?>
                        <?php
					if(isset($this->variables['oVideo']) && count($this->variables['oVideo']) != 0 && $this->variables['oVideo'] != '' && $this->variables['oVideo'] !== false)
					{
						?>
				<p id="title"><?php if(array_key_exists('title', (array) $this->variables)) { echo $this->variables['title']; } else { ?>{$title}<?php } ?></p>
                                <video id="vid" src="<?php if(array_key_exists('vid', (array) $this->variables)) { echo $this->variables['vid']; } else { ?>{$vid}<?php } ?>" controls autobuffer>
                        <?php } ?>
			</div>

			<?php if(array_key_exists('frmEdit', (array) $this->variables)) { echo $this->variables['frmEdit']; } else { ?>{$frmEdit}<?php } ?>

    		<p id="delSlide" class="add"><a href="<?php if(array_key_exists('self', (array) $this->variables)) { echo $this->variables['self']; } else { ?>{$self}<?php } ?>&delete=<?php if(array_key_exists('nr', (array) $this->variables)) { echo $this->variables['nr']; } else { ?>{$nr}<?php } ?>" onclick="confirmation()">Delete slide</a></p>
    		<p id="addSlide" class="add"><a href="#" onclick="document.forms[0].submit()">Add slide</a></p>

    		<h3>Slides</h3>

			<div id="scroll" class="clearfix">
                                <div class="viewport clearfix">
                                    <div class="overview clearfix">
                                        <?php
					if(!isset($this->variables['iSlides']))
					{
						?>{iteration:iSlides}<?php
						$this->variables['iSlides'] = array();
						$this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iSlides'})) $this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['old'] = ${'iSlides'};
				$this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['iteration'] = $this->variables['iSlides'];
				$this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['i'] = 1;
				$this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['count'] = count($this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['iteration'] as ${'iSlides'})
				{
					if(!isset(${'iSlides'}['first']) && $this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['i'] == 1) ${'iSlides'}['first'] = true;
					if(!isset(${'iSlides'}['last']) && $this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['i'] == $this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['count']) ${'iSlides'}['last'] = true;
					if(isset(${'iSlides'}['formElements']) && is_array(${'iSlides'}['formElements']))
					{
						foreach(${'iSlides'}['formElements'] as $name => $object)
						{
							${'iSlides'}[$name] = $object->parse();
							${'iSlides'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>  
                                            <div class="slide <?php if(array_key_exists('template', (array) ${'iSlides'})) { echo ${'iSlides'}['template']; } else { ?>{$iSlides->template}<?php } ?>" onclick="location.href='<?php if(array_key_exists('self', (array) $this->variables)) { echo $this->variables['self']; } else { ?>{$self}<?php } ?>&template=<?php if(array_key_exists('template', (array) ${'iSlides'})) { echo ${'iSlides'}['template']; } else { ?>{$iSlides->template}<?php } ?>&nr=<?php if(array_key_exists('nr', (array) ${'iSlides'})) { echo ${'iSlides'}['nr']; } else { ?>{$iSlides->nr}<?php } ?>'" style="cursor:pointer;">
                                            <?php
					if(isset(${'iSlides'}['oTitle']) && count(${'iSlides'}['oTitle']) != 0 && ${'iSlides'}['oTitle'] != '' && ${'iSlides'}['oTitle'] !== false)
					{
						?>
                                                        <p class="title"><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></p>
                                                        <p class="subtitle"><?php if(array_key_exists('subtitle', (array) ${'iSlides'})) { echo ${'iSlides'}['subtitle']; } else { ?>{$iSlides->subtitle}<?php } ?></p>
                                            <?php } ?>
                                            <?php
					if(isset(${'iSlides'}['oContent']) && count(${'iSlides'}['oContent']) != 0 && ${'iSlides'}['oContent'] != '' && ${'iSlides'}['oContent'] !== false)
					{
						?>
                                                        <p class="title"><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></p>
                                                        <p class="sampleText"><?php if(array_key_exists('text', (array) ${'iSlides'})) { echo ${'iSlides'}['text']; } else { ?>{$iSlides->text}<?php } ?></p>
                                            <?php } ?>
                                            <?php
					if(isset(${'iSlides'}['oImage']) && count(${'iSlides'}['oImage']) != 0 && ${'iSlides'}['oImage'] != '' && ${'iSlides'}['oImage'] !== false)
					{
						?>
                                                        <p class="title"><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></p>
                                                        <p><img src="<?php if(array_key_exists('imgSrc', (array) ${'iSlides'})) { echo ${'iSlides'}['imgSrc']; } else { ?>{$iSlides->imgSrc}<?php } ?>" width="99" height="69" alt="img"/></p>
                                            <?php } ?>
                                            <?php
					if(isset(${'iSlides'}['oVideo']) && count(${'iSlides'}['oVideo']) != 0 && ${'iSlides'}['oVideo'] != '' && ${'iSlides'}['oVideo'] !== false)
					{
						?>                             
                                                        <p class="title"><?php if(array_key_exists('title', (array) ${'iSlides'})) { echo ${'iSlides'}['title']; } else { ?>{$iSlides->title}<?php } ?></p>
                                                        <p><img src="core/img/templateVideo.png" width="99" height="61" alt="video"/></p>
                                            <?php } ?>  
                                            </div>
                                        <?php
					$this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['fail']) && $this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iSlides}<?php
					}
				if(isset($this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['old'])) ${'iSlides'} = $this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']['old'];
				else unset($this->iterations['799b153507423191e943107af5225357_slideEditor.tpl.php_1']);
				?>
                                    </div>                        
                              </div>       
                              <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
			</div>
		</div>
	  </div>
</body>
</html>