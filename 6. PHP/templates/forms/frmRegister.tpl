{form:frmRegister}
	<fieldset class="fs" id="fieldset1">
		<legend>General Information</legend>
		<dl>
			<dt><label for="username">Username *</label></dt>
			<dd class="required">
				{$txtUsername}{$txtUsernameError}
			</dd>
			<dt><label for="email">Emailaddress *</label></dt>
			<dd>
				{$txtEmail}{$txtEmailError}
			</dd>
			<dt><label for="firstname">Firstname</label></dt>
			<dd>
				{$txtFirstname}{$txtFirstnameError}
			</dd>
			<dt><label for="name">Name</label></dt>
			<dd>
				{$txtName}{$txtNameError}
			</dd>
		</dl>
	</fieldset>
	<fieldset class="fs" id="fieldset2">
		<legend>Password</legend>
		<dl>
			<dt><label for="pass">Password *</label></dt>
			<dd class="required">
				{$txtPass}{$txtPassError}
			</dd>
			<dt><label for="repeatPass">Repeat Password *</label></dt>
			<dd class="required">
				{$txtRepeatPass}{$txtRepeatPassError}
			</dd>
		</dl>
	</fieldset>
	<fieldset class="fs" id="fieldset3">
		<legend>Picture</legend>
		<dl>
			<dt>Upload a profile picture or use the default and do it later.</dt>
			<dd id="imgBox">
				<img src="./files/users/default.png" width="100" height="150" alt="img"/>
			</dd>
			<dd>
				{$fileProfilePic}{$fileProfilePicError}
			</dd>
			<dt>
				<!--  <input type="submit" id="btnUpload" name="btnUpload" value="Upload" /> -->
			</dt>
		</dl>
	</fieldset>
	
	{$btnSubmit}
{/form:frmRegister}