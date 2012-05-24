<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<?php
					if(isset($this->forms['frmRegister']))
					{
						?><form action="<?php echo $this->forms['frmRegister']->getAction(); ?>" method="<?php echo $this->forms['frmRegister']->getMethod(); ?>"<?php echo $this->forms['frmRegister']->getParametersHTML(); ?>>
						<?php echo $this->forms['frmRegister']->getField('form')->parse();
						if($this->forms['frmRegister']->getUseToken())
						{
							?><input type="hidden" name="form_token" id="<?php echo $this->forms['frmRegister']->getField('form_token')->getAttribute('id'); ?>" value="<?php echo $this->forms['frmRegister']->getField('form_token')->getValue(); ?>" />
						<?php } ?>
	<fieldset class="fs" id="fieldset1">
		<legend>General Information</legend>
		<dl>
			<dt><label for="username">Username *</label></dt>
			<dd class="required">
				<?php if(array_key_exists('txtUsername', (array) $this->variables)) { echo $this->variables['txtUsername']; } else { ?>{$txtUsername}<?php } ?><?php if(array_key_exists('txtUsernameError', (array) $this->variables)) { echo $this->variables['txtUsernameError']; } else { ?>{$txtUsernameError}<?php } ?>
			</dd>
			<dt><label for="email">Emailaddress *</label></dt>
			<dd>
				<?php if(array_key_exists('txtEmail', (array) $this->variables)) { echo $this->variables['txtEmail']; } else { ?>{$txtEmail}<?php } ?><?php if(array_key_exists('txtEmailError', (array) $this->variables)) { echo $this->variables['txtEmailError']; } else { ?>{$txtEmailError}<?php } ?>
			</dd>
			<dt><label for="firstname">Firstname</label></dt>
			<dd>
				<?php if(array_key_exists('txtFirstname', (array) $this->variables)) { echo $this->variables['txtFirstname']; } else { ?>{$txtFirstname}<?php } ?><?php if(array_key_exists('txtFirstnameError', (array) $this->variables)) { echo $this->variables['txtFirstnameError']; } else { ?>{$txtFirstnameError}<?php } ?>
			</dd>
			<dt><label for="name">Name</label></dt>
			<dd>
				<?php if(array_key_exists('txtName', (array) $this->variables)) { echo $this->variables['txtName']; } else { ?>{$txtName}<?php } ?><?php if(array_key_exists('txtNameError', (array) $this->variables)) { echo $this->variables['txtNameError']; } else { ?>{$txtNameError}<?php } ?>
			</dd>
		</dl>
	</fieldset>
	<fieldset class="fs" id="fieldset2">
		<legend>Password</legend>
		<dl>
			<dt><label for="pass">Password *</label></dt>
			<dd class="required">
				<?php if(array_key_exists('txtPass', (array) $this->variables)) { echo $this->variables['txtPass']; } else { ?>{$txtPass}<?php } ?><?php if(array_key_exists('txtPassError', (array) $this->variables)) { echo $this->variables['txtPassError']; } else { ?>{$txtPassError}<?php } ?>
			</dd>
			<dt><label for="repeatPass">Repeat Password *</label></dt>
			<dd class="required">
				<?php if(array_key_exists('txtRepeatPass', (array) $this->variables)) { echo $this->variables['txtRepeatPass']; } else { ?>{$txtRepeatPass}<?php } ?><?php if(array_key_exists('txtRepeatPassError', (array) $this->variables)) { echo $this->variables['txtRepeatPassError']; } else { ?>{$txtRepeatPassError}<?php } ?>
			</dd>
		</dl>
	</fieldset>
	<fieldset class="fs" id="fieldset3">
		<legend>Picture</legend>
		<dl>
			<dt>Upload a profile picture or use the default and do it later.</dt>
			<dd id="imgBox">
				<img src="./files/profile_pics/default.png" width="100" height="150" alt="img"/>
			</dd>
			<dd>
				<?php if(array_key_exists('fileProfilePic', (array) $this->variables)) { echo $this->variables['fileProfilePic']; } else { ?>{$fileProfilePic}<?php } ?><?php if(array_key_exists('fileProfilePicError', (array) $this->variables)) { echo $this->variables['fileProfilePicError']; } else { ?>{$fileProfilePicError}<?php } ?>
			</dd>
			<dt>
				<!--  <input type="submit" id="btnUpload" name="btnUpload" value="Upload" /> -->
			</dt>
		</dl>
	</fieldset>
	
	<?php if(array_key_exists('btnSubmit', (array) $this->variables)) { echo $this->variables['btnSubmit']; } else { ?>{$btnSubmit}<?php } ?>
</form>
				<?php } ?>