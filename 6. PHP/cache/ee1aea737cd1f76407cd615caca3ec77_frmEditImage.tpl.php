<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmEditImage']))
					{
						?><form action="<?php echo $this->forms['frmEditImage']->getAction(); ?>" method="<?php echo $this->forms['frmEditImage']->getMethod(); ?>"<?php echo $this->forms['frmEditImage']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmEditImage']->getField('form')->parse();
						if($this->forms['frmEditImage']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmEditImage']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmEditImage']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
<fieldset>
					<legend>Content</legend>
				<dl>
					<dt><label for="contentTitle">Title</label></dt>
					<dd>
						<?php if(array_key_exists('txtContentTitle', (array) $this->variables)) { echo $this->variables['txtContentTitle']; } else { ?>{$txtContentTitle}<?php } ?><?php if(array_key_exists('txtContentTitleError', (array) $this->variables)) { echo $this->variables['txtContentTitleError']; } else { ?>{$txtContentTitleError}<?php } ?>
					</dd>
					<dt><label for="contentImage">Image</label></dt>
					<dd>
						<?php if(array_key_exists('fileContentImage', (array) $this->variables)) { echo $this->variables['fileContentImage']; } else { ?>{$fileContentImage}<?php } ?><?php if(array_key_exists('fileContentImageError', (array) $this->variables)) { echo $this->variables['fileContentImageError']; } else { ?>{$fileContentImageError}<?php } ?>
					</dd>
				</dl>
</fieldset>
</form>
				<?php } ?>