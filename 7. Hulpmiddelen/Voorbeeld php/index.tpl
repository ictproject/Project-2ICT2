 <div id="home_text" class="text">
	
   	<h1>Welkom</h1>
   	<p>Dit is de website van Agrotechniek Van Massenhove. U kunt hier meer informatie vinden over ons bedrijf zoals de <a href="contact.php">contactgegevens en openingsuren</a>. Daarnaast vindt u welke <a href="new.php">merken</a> wij verkopen alsook <a href="used.php">tweedehands machines</a>. Indien iets niet duidelijk is aarzel dan niet om contact op te nemen via <a href="mailto:info@agrotechniekvanmassenhove.be">info@agrotechniekvanmassenhove.be</a>.  </p>
	
	<h2>Berichten</h2>
		<ul>
		 	{option:oMessages}
		    {iteration:iMessages}
		    	<li><a href="#{$iMessages.title}">{$iMessages.title}</a></li>
			{/iteration:iMessages}
			{/option:oMessages}
			{option:!oMessages}
				<li>Er zijn momenteel geen berichten</li>
			{/option:!oMessages}
	
 </div>
 
 <div id="gallery" class="boxed clearfix">
 		{iteration:iImages}
 			<a href="gallery.php" {$iImages.first}><img src="{$gallery_image_path}{$iImages.src}" alt="{$iImages.src}" ></a>
     	{/iteration:iImages}
 </div>
 
 <div class="text">
	{option:oMessages}
    {iteration:iMessages}
		<div class="message clearfix {option:!iMessages.image}no_image{/option:!iMessages.image}">
			<a id="{$iMessages.title}"></a>
		    <h2>{$iMessages.title}</h2>
		    {option:iMessages.image}<img src="{$message_image_path}{$iMessages.image}" width="400" alt="Image {$iMessages.title}" >{/option:iMessages.image}
		   	<p>{$iMessages.text}</p>
		</div>
	{/iteration:iMessages}
	{/option:oMessages}
 </div>

            
    
