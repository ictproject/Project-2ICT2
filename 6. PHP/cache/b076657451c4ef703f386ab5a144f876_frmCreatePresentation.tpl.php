<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmCreatePresentation']))
					{
						?><form action="<?php echo $this->forms['frmCreatePresentation']->getAction(); ?>" method="<?php echo $this->forms['frmCreatePresentation']->getMethod(); ?>"<?php echo $this->forms['frmCreatePresentation']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmCreatePresentation']->getField('form')->parse();
						if($this->forms['frmCreatePresentation']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmCreatePresentation']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmCreatePresentation']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
				<dl>
					<dt>
						<?php if(array_key_exists('btnSubmit', (array) $this->variables)) { echo $this->variables['btnSubmit']; } else { ?>{$btnSubmit}<?php } ?>
					</dt>
					<dt><label for="name">Name:</label></dt>
					<dd>
						<?php if(array_key_exists('txtName', (array) $this->variables)) { echo $this->variables['txtName']; } else { ?>{$txtName}<?php } ?><?php if(array_key_exists('txtNameError', (array) $this->variables)) { echo $this->variables['txtNameError']; } else { ?>{$txtNameError}<?php } ?>
					</dd>
	
					<dt id="options">Sharing Options</dt>
					<dt id="checkPublic"><?php if(array_key_exists('chkPublic', (array) $this->variables)) { echo $this->variables['chkPublic']; } else { ?>{$chkPublic}<?php } ?><label for="public">Public Presentation</label><?php if(array_key_exists('chkPublicError', (array) $this->variables)) { echo $this->variables['chkPublicError']; } else { ?>{$chkPublicError}<?php } ?></dt>
                                        
                                        <?php if(array_key_exists('ddmGroups', (array) $this->variables)) { echo $this->variables['ddmGroups']; } else { ?>{$ddmGroups}<?php } ?> <?php if(array_key_exists('ddmGroupsError', (array) $this->variables)) { echo $this->variables['ddmGroupsError']; } else { ?>{$ddmGroupsError}<?php } ?>
				</dl>
</form>
				<?php } ?>