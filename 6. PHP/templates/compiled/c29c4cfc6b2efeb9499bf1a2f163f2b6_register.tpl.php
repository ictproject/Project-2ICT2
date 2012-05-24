<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Register</h3>

<form action="#" method="post">
	<fieldset class="fs" id="fieldset1">
		<legend>General Information</legend>
		<dl>
			<dt>
				<input type="submit" id="btnSubmit" name="btnSubmit" value="Finish" />
			</dt>
			<dt><label for="username">Username</label></dt>
			<dd class="required">
				<input type="text" id="username" size="20" name="username" value=""/>
			</dd>
			<dt><label for="firstname">Firstname</label></dt>
			<dd>
				<input type="text" id="firstname" size="20" name="firstname" value=""/>
			</dd>
			<dt><label for="name">Name</label></dt>
			<dd>
				<input type="text" id="name" size="20" name="name" value=""/>
			</dd>
			<dt><label for="email">Emailaddress</label></dt>
			<dd>
				<input type="text" id="email" size="20" name="email" value=""/>
			</dd>
		</dl>
	</fieldset>
	<fieldset class="fs" id="fieldset2">
		<legend>Password</legend>
		<dl>
			<dt><label for="password">Password</label></dt>
			<dd class="required">
				<input type="password" id="password" size="20" name="password" value=""/>
			</dd>
			<dt><label for="RepPassword">Repeat Password</label></dt>
			<dd class="required">
				<input type="password" id="RepPassword" size="20" name="RepPassword" value=""/>
			</dd>
		</dl>
	</fieldset>
	<fieldset class="fs" id="fieldset3">
		<legend>Picture</legend>
		<dl>
			<dt>Upload a profile picture or use the default and do it later.</dt>
			<dd id="imgBox">
				<img src="./images/Poker_FaceCzyste.png" width="95" height="148" alt="img"/>
			</dd>
			<dd>
				<input type="file" id="picture" size="35" name="picture" value=""/>
			</dd>
			<dt>
				<input type="submit" id="btnUpload" name="btnUpload" value="Upload" />
			</dt>
		</dl>
	</fieldset>
 		</form>

