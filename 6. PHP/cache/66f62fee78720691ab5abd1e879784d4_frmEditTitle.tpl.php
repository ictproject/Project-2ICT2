<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmEditTitle']))
					{
						?><form action="<?php echo $this->forms['frmEditTitle']->getAction(); ?>" method="<?php echo $this->forms['frmEditTitle']->getMethod(); ?>"<?php echo $this->forms['frmEditTitle']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmEditTitle']->getField('form')->parse();
						if($this->forms['frmEditTitle']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmEditTitle']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmEditTitle']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
<fieldset>
					<legend>Content</legend>
				<dl>
					<dt><label for="contentTitle">Title</label></dt>
					<dd>
						<?php if(array_key_exists('txtContentTitle', (array) $this->variables)) { echo $this->variables['txtContentTitle']; } else { ?>{$txtContentTitle}<?php } ?><?php if(array_key_exists('txtContentTitleError', (array) $this->variables)) { echo $this->variables['txtContentTitleError']; } else { ?>{$txtContentTitleError}<?php } ?>
					</dd>
					<dt><label for="contentSubtitle">Subtitle</label></dt>
					<dd>
						<?php if(array_key_exists('txtContentSubtitle', (array) $this->variables)) { echo $this->variables['txtContentSubtitle']; } else { ?>{$txtContentSubtitle}<?php } ?><?php if(array_key_exists('txtContentSubtitleError', (array) $this->variables)) { echo $this->variables['txtContentSubtitleError']; } else { ?>{$txtContentSubtitleError}<?php } ?>
					</dd>
				</dl>
</fieldset>
</form>
				<?php } ?>