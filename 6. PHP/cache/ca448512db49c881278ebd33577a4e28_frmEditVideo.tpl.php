<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmEditVideo']))
					{
						?><form action="<?php echo $this->forms['frmEditVideo']->getAction(); ?>" method="<?php echo $this->forms['frmEditVideo']->getMethod(); ?>"<?php echo $this->forms['frmEditVideo']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmEditVideo']->getField('form')->parse();
						if($this->forms['frmEditVideo']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmEditVideo']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmEditVideo']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
<fieldset>
					<legend>Content</legend>
				<dl>
					<dt><label for="contentTitle">Title</label></dt>
					<dd>
						<?php if(array_key_exists('txtContentTitle', (array) $this->variables)) { echo $this->variables['txtContentTitle']; } else { ?>{$txtContentTitle}<?php } ?><?php if(array_key_exists('txtContentTitleError', (array) $this->variables)) { echo $this->variables['txtContentTitleError']; } else { ?>{$txtContentTitleError}<?php } ?>
					</dd>
					<dt><label for="contentVideo">Video</label></dt>
					<dd>
						<?php if(array_key_exists('fileContentVideo', (array) $this->variables)) { echo $this->variables['fileContentVideo']; } else { ?>{$fileContentVideo}<?php } ?><?php if(array_key_exists('fileContentVideoError', (array) $this->variables)) { echo $this->variables['fileContentVideoError']; } else { ?>{$fileContentVideoError}<?php } ?>
					</dd>
				</dl>
</fieldset>
</form>
				<?php } ?>