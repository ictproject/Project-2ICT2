<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmEditContent']))
					{
						?><form action="<?php echo $this->forms['frmEditContent']->getAction(); ?>" method="<?php echo $this->forms['frmEditContent']->getMethod(); ?>"<?php echo $this->forms['frmEditContent']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmEditContent']->getField('form')->parse();
						if($this->forms['frmEditContent']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmEditContent']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmEditContent']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
<fieldset>
					<legend>Content</legend>
				<dl>
					<dt><label for="contentTitle">Title</label></dt>
					<dd>
						<?php if(array_key_exists('txtContentTitle', (array) $this->variables)) { echo $this->variables['txtContentTitle']; } else { ?>{$txtContentTitle}<?php } ?><?php if(array_key_exists('txtContentTitleError', (array) $this->variables)) { echo $this->variables['txtContentTitleError']; } else { ?>{$txtContentTitleError}<?php } ?>
					</dd>
					<dt><label for="contentText">Text</label></dt>
					<dd>
						<?php if(array_key_exists('txtContentText', (array) $this->variables)) { echo $this->variables['txtContentText']; } else { ?>{$txtContentText}<?php } ?><?php if(array_key_exists('txtContentTextError', (array) $this->variables)) { echo $this->variables['txtContentTextError']; } else { ?>{$txtContentTextError}<?php } ?>
					</dd>
				</dl>
</fieldset>
</form>
				<?php } ?>