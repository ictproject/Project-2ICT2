<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Profile</h3>

<h4>Presentations</h4>
<?php
					if(isset($this->variables['oUserIsAdmin']) && count($this->variables['oUserIsAdmin']) != 0 && $this->variables['oUserIsAdmin'] != '' && $this->variables['oUserIsAdmin'] !== false)
					{
						?>

<?php } ?>
<?php if(!isset($this->variables['oUserIsAdmin']) || count($this->variables['oUserIsAdmin']) == 0 || $this->variables['oUserIsAdmin'] == '' || $this->variables['oUserIsAdmin'] === false): ?>
    <p class="hidden"></p>
<?php endif; ?>
<div id="presentations">
        <div id="scroll">
            <?php
					if(!isset($this->variables['iPresentations']))
					{
						?>{iteration:iPresentations}<?php
						$this->variables['iPresentations'] = array();
						$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iPresentations'})) $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['old'] = ${'iPresentations'};
				$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['iteration'] = $this->variables['iPresentations'];
				$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['i'] = 1;
				$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['count'] = count($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['iteration'] as ${'iPresentations'})
				{
					if(!isset(${'iPresentations'}['first']) && $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['i'] == 1) ${'iPresentations'}['first'] = true;
					if(!isset(${'iPresentations'}['last']) && $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['i'] == $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['count']) ${'iPresentations'}['last'] = true;
					if(isset(${'iPresentations'}['formElements']) && is_array(${'iPresentations'}['formElements']))
					{
						foreach(${'iPresentations'}['formElements'] as $name => $object)
						{
							${'iPresentations'}[$name] = $object->parse();
							${'iPresentations'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
                <div class="presentation" onclick="window.open('presentation.php?p=<?php if(array_key_exists('id', (array) ${'iPresentations'})) { echo ${'iPresentations'}['id']; } else { ?>{$iPresentations->id}<?php } ?>');" style="cursor:pointer;">
                        <p class="title"><?php if(array_key_exists('name', (array) ${'iPresentations'})) { echo ${'iPresentations'}['name']; } else { ?>{$iPresentations->name}<?php } ?></p>
                </div>
            <?php
					$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['fail']) && $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iPresentations}<?php
					}
				if(isset($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['old'])) ${'iPresentations'} = $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']['old'];
				else unset($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_1']);
				?>
        </div>
</div>

<div id="general">
        <h4>General Information</h4>
        <?php
					if(isset($this->variables['oUserIsAdmin']) && count($this->variables['oUserIsAdmin']) != 0 && $this->variables['oUserIsAdmin'] != '' && $this->variables['oUserIsAdmin'] !== false)
					{
						?>
            <p class="edit"><a href="#" onclick="toggle_visibility('editGeneral');">Edit</a></p>
        <?php } ?>
        <?php if(!isset($this->variables['oUserIsAdmin']) || count($this->variables['oUserIsAdmin']) == 0 || $this->variables['oUserIsAdmin'] == '' || $this->variables['oUserIsAdmin'] === false): ?>
            <p class="hidden"></p>
        <?php endif; ?>
        <p><span>Name</span><?php if(array_key_exists('fullName', (array) $this->variables)) { echo $this->variables['fullName']; } else { ?>{$fullName}<?php } ?></p>
        <p><span>Email</span><?php if(array_key_exists('email', (array) $this->variables)) { echo $this->variables['email']; } else { ?>{$email}<?php } ?></p>
        <p><span>Member since</span><?php if(array_key_exists('memberSince', (array) $this->variables)) { echo $this->variables['memberSince']; } else { ?>{$memberSince}<?php } ?></p>
        <form action="#" method="post" id="editGeneral">
            <p><span>Name</span><input type="text" name="txtName" value=<?php if(isset($this->variables['user']) && array_key_exists('name', (array) $this->variables['user'])) { echo $this->variables['user']['name']; } else { ?>{$user.name}<?php } ?> /></p>
            <p><span>Firstname</span><input type="text" name="txtFirstName" value="<?php if(isset($this->variables['user']) && array_key_exists('firstname', (array) $this->variables['user'])) { echo $this->variables['user']['firstname']; } else { ?>{$user.firstname}<?php } ?>" /></p>
            <p><span>Email</span><input type="text" name="txtEmail" value="<?php if(isset($this->variables['user']) && array_key_exists('email', (array) $this->variables['user'])) { echo $this->variables['user']['email']; } else { ?>{$user.email}<?php } ?>" /></p>
            <input type="submit" value="Edit" />
        </form>
</div>

<div id="picture">
        <h4>Picture</h4>
        <?php
					if(isset($this->variables['oUserIsAdmin']) && count($this->variables['oUserIsAdmin']) != 0 && $this->variables['oUserIsAdmin'] != '' && $this->variables['oUserIsAdmin'] !== false)
					{
						?>
            <p class="edit"><a href="#" onclick="toggle_visibility('editPicture');">Edit</a></p>
        <?php } ?>
        <?php if(!isset($this->variables['oUserIsAdmin']) || count($this->variables['oUserIsAdmin']) == 0 || $this->variables['oUserIsAdmin'] == '' || $this->variables['oUserIsAdmin'] === false): ?>
            <p class="hidden"></p>
        <?php endif; ?>
        <form action="#" method="post" id="editPicture">
            <?php if(array_key_exists('frmEditProfilePic', (array) $this->variables)) { echo $this->variables['frmEditProfilePic']; } else { ?>{$frmEditProfilePic}<?php } ?>
        </form>

        <div id="imgBox">
                <img src="<?php if(array_key_exists('imgSrc', (array) $this->variables)) { echo $this->variables['imgSrc']; } else { ?>{$imgSrc}<?php } ?>"  alt="img"/>
        </div>
</div>

<div id="groups">
        <h4>Groups</h4>
        <?php
					if(isset($this->variables['oUserIsAdmin']) && count($this->variables['oUserIsAdmin']) != 0 && $this->variables['oUserIsAdmin'] != '' && $this->variables['oUserIsAdmin'] !== false)
					{
						?>
            <p class="edit"><a href="editGroups.php">Edit</a></p>
        <?php } ?>
        <?php if(!isset($this->variables['oUserIsAdmin']) || count($this->variables['oUserIsAdmin']) == 0 || $this->variables['oUserIsAdmin'] == '' || $this->variables['oUserIsAdmin'] === false): ?>
            <p class="hidden"></p>
        <?php endif; ?>
        <?php
					if(!isset($this->variables['iGroups']))
					{
						?>{iteration:iGroups}<?php
						$this->variables['iGroups'] = array();
						$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['fail'] = true;
					}
				if(isset(${'iGroups'})) $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['old'] = ${'iGroups'};
				$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['iteration'] = $this->variables['iGroups'];
				$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['i'] = 1;
				$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['count'] = count($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['iteration']);
				foreach((array) $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['iteration'] as ${'iGroups'})
				{
					if(!isset(${'iGroups'}['first']) && $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['i'] == 1) ${'iGroups'}['first'] = true;
					if(!isset(${'iGroups'}['last']) && $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['i'] == $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['count']) ${'iGroups'}['last'] = true;
					if(isset(${'iGroups'}['formElements']) && is_array(${'iGroups'}['formElements']))
					{
						foreach(${'iGroups'}['formElements'] as $name => $object)
						{
							${'iGroups'}[$name] = $object->parse();
							${'iGroups'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
        <p class="group"><a href="groupPageNormalUser.php?id=<?php if(array_key_exists('id', (array) ${'iGroups'})) { echo ${'iGroups'}['id']; } else { ?>{$iGroups->id}<?php } ?>"><?php if(array_key_exists('name', (array) ${'iGroups'})) { echo ${'iGroups'}['name']; } else { ?>{$iGroups->name}<?php } ?></a></p>
        <?php
					$this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['i']++;
				}
					if(isset($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['fail']) && $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['fail'] == true)
					{
						?>{/iteration:iGroups}<?php
					}
				if(isset($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['old'])) ${'iGroups'} = $this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']['old'];
				else unset($this->iterations['f5da8bb7890348074e60ce8ef0f62e26_profile.tpl.php_2']);
				?>
</div>