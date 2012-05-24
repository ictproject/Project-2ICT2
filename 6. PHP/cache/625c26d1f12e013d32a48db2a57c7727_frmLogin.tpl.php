<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmLogin']))
					{
						?><form action="<?php echo $this->forms['frmLogin']->getAction(); ?>" method="<?php echo $this->forms['frmLogin']->getMethod(); ?>"<?php echo $this->forms['frmLogin']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmLogin']->getField('form')->parse();
						if($this->forms['frmLogin']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmLogin']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmLogin']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
    <fieldset class="fs" id="fieldset1">
            <dl>
                    <dt><label for="username">Username</label></dt>
                    <dd class="required">
                            <?php if(array_key_exists('txtUsername', (array) $this->variables)) { echo $this->variables['txtUsername']; } else { ?>{$txtUsername}<?php } ?><?php if(array_key_exists('txtUsernameError', (array) $this->variables)) { echo $this->variables['txtUsernameError']; } else { ?>{$txtUsernameError}<?php } ?>
                    </dd>
                    <dt><label for="password">Password</label></dt>
                    <dd class="required">
                            <?php if(array_key_exists('txtPassword', (array) $this->variables)) { echo $this->variables['txtPassword']; } else { ?>{$txtPassword}<?php } ?><?php if(array_key_exists('txtPasswordError', (array) $this->variables)) { echo $this->variables['txtPasswordError']; } else { ?>{$txtPasswordError}<?php } ?>
                    </dd>
                    <dt>   
                        <?php if(array_key_exists('chkSaveUser', (array) $this->variables)) { echo $this->variables['chkSaveUser']; } else { ?>{$chkSaveUser}<?php } ?> <label for="saveUser">Save user</label>               
                    </dt>
                    <dt>
                        <?php if(array_key_exists('btnLogin', (array) $this->variables)) { echo $this->variables['btnLogin']; } else { ?>{$btnLogin}<?php } ?>
                    </dt>
            </dl>
    </fieldset>
</form>
				<?php } ?>

