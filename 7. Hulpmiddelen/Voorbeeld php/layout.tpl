<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="nl">
    <head>
        <title>{$title}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="core/css/screen.css">
        {option:javascript}
        {iteration:scripts}
        	<script type="text/javascript" src="{$scripts.js}"></script>
        {/iteration:scripts}
        {/option:javascript}
    </head>
    <body>
        <div id="site_wrapper">
            <div id="header">
                <div id="logo_bg"><a id="logo" href="index.php">Logo</a></div>
                <div id="site_title">Agrotechniek Van Massenhove</div>
                <div id="sub_title">Verkoop - Herstellingen - Advies</div>
            </div>
            <ul id="menu" class="clearfix">
                <li {option:home_nav} class="selected" {/option:home_nav}><a href="index.php">Home</a></li>
				<li {option:new_nav} class="selected" {/option:new_nav}><a href="new.php">Nieuwe machines</a></li>
                <li {option:used_nav} class="selected" {/option:used_nav}><a href="used.php">Tweedehands</a></li>
                <li {option:gallery_nav} class="selected" {/option:gallery_nav}><a href="gallery.php">Fotogallerij</a></li>
                <li {option:contact_nav} class="selected" {/option:contact_nav}><a href="contact.php">Contact & Openingsuren</a></li>
                <li id="logo_deere">John Deere</li>
            </ul>
            <div id="main" class="clearfix">
                {$page_content}
            </div>
            <div id="footer">
                <p>Copyright © 2010-2011 Agrotechniek Vanmassenhove</p>
                <p>Webdesign: Thomas Vandermarliere</p>
            </div>
        </div>
    </body>
</html>
