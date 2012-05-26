<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmEditProfilePic']))
					{
						?><form action="<?php echo $this->forms['frmEditProfilePic']->getAction(); ?>" method="<?php echo $this->forms['frmEditProfilePic']->getMethod(); ?>"<?php echo $this->forms['frmEditProfilePic']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmEditProfilePic']->getField('form')->parse();
						if($this->forms['frmEditProfilePic']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmEditProfilePic']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmEditProfilePic']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
            <dl>
                <dd>
                        
                        <?php if(array_key_exists('filePhoto', (array) $this->variables)) { echo $this->variables['filePhoto']; } else { ?>{$filePhoto}<?php } ?> <?php if(array_key_exists('filePhotoError', (array) $this->variables)) { echo $this->variables['filePhotoError']; } else { ?>{$filePhotoError}<?php } ?>
                </dd>
            </dl>
	<?php if(array_key_exists('btnSubmit', (array) $this->variables)) { echo $this->variables['btnSubmit']; } else { ?>{$btnSubmit}<?php } ?>
</form>
				<?php } ?>