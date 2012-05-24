<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmCreateGroup']))
					{
						?><form action="<?php echo $this->forms['frmCreateGroup']->getAction(); ?>" method="<?php echo $this->forms['frmCreateGroup']->getMethod(); ?>"<?php echo $this->forms['frmCreateGroup']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmCreateGroup']->getField('form')->parse();
						if($this->forms['frmCreateGroup']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmCreateGroup']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmCreateGroup']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
				<dl>
					<dt>
						<?php if(array_key_exists('btnSubmit', (array) $this->variables)) { echo $this->variables['btnSubmit']; } else { ?>{$btnSubmit}<?php } ?>
					</dt>
					<dt><label for="name">Name:</label></dt>
					<dd>
						<?php if(array_key_exists('txtName', (array) $this->variables)) { echo $this->variables['txtName']; } else { ?>{$txtName}<?php } ?><?php if(array_key_exists('txtNameError', (array) $this->variables)) { echo $this->variables['txtNameError']; } else { ?>{$txtNameError}<?php } ?>
					</dd>
					<dt><label for="comment">Description:</label></dt>
					<dd>
						<?php if(array_key_exists('txtDescription', (array) $this->variables)) { echo $this->variables['txtDescription']; } else { ?>{$txtDescription}<?php } ?><?php if(array_key_exists('txtDescriptionError', (array) $this->variables)) { echo $this->variables['txtDescriptionError']; } else { ?>{$txtDescriptionError}<?php } ?>
					</dd>
					<dt id="options">Sharing Options</dt>
					<dt id="checkPublic"><?php if(array_key_exists('chkPublic', (array) $this->variables)) { echo $this->variables['chkPublic']; } else { ?>{$chkPublic}<?php } ?><label for="public">Public Group</label><?php if(array_key_exists('chkPublicError', (array) $this->variables)) { echo $this->variables['chkPublicError']; } else { ?>{$chkPublicError}<?php } ?></dt>
				</dl>
</form>
				<?php } ?>