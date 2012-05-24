<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
  <title> Open Presentations </title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
  <link rel="stylesheet" type="text/css" href="core/css/library.css" />
  <link rel="stylesheet" type="text/css" href="core/css/slideEditor.css" />
</head>
<body>
  <div id="headerWrapper">
	<div id="header">
	  <h1><a href="index.php">Open Presentations</a></h1>
	  <h2>Slide editor</h2>
	  <p id="exit"><a href="myPresentations.php">Exit</a></p>
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

			<div id="bigSlide">
				<p id="bigTitle">Introduction in C#</p>
				<p id="bigSubtitle">By Ben Parker</p>
			</div>

			<form action="#" method="get">
				<fieldset>
					<legend>Content</legend>
					<dl>
						<dt><label for="contentTitle">Title</label></dt>
						<dd>
							<input type="text" id="contentTitle" size="20" name="contentTitle" value=""/>
						</dd>
						<dt><label for="contentSubtitle">Subtitle</label></dt>
						<dd>
							<input type="text" id="contentSubtitle" size="20" name="contentSubtitle" value=""/>
						</dd>
					</dl>
				</fieldset>
    		</form>

    		<p id="delSlide" class="add"><a href="#">Delete slide</a></p>
    		<p id="addSlide" class="add"><a href="#">Add slide</a></p>

    		<h3>Slides</h3>

			<div id="slides">
				<div id="scroll">
					<div class="slide title">
						<p class="title">Title</p>
						<p class="subtitle">Subtitle</p>
					</div>

					<div class="slide text">
						<p class="title">Title</p>
						<p class="sampleText">Sample text</p>
					</div>

					<div class="slide image">
						<p class="title">Title</p>
						<p><img src="core/img/templateImg.png" width="99" height="69" alt="img"/></p>
					</div>

					<div class="slide video">
						<p class="title">Title</p>
						<p><img src="core/img/templateVideo.png" width="99" height="61" alt="video"/></p>
					</div>

					<div class="slide title">
						<p class="title">Title</p>
						<p class="subtitle">Subtitle</p>
					</div>

					<div class="slide text">
						<p class="title">Title</p>
						<p class="sampleText">Sample text</p>
					</div>

					<div class="slide image">
						<p class="title">Title</p>
						<p><img src="core/img/templateImg.png" width="99" height="69" alt="img"/></p>
					</div>

					<div class="slide video">
						<p class="title">Title</p>
						<p><img src="core/img/templateVideo.png" width="99" height="61" alt="video"/></p>
					</div>
				</div>
			</div>
		</div>
	  </div>
</body>
</html>