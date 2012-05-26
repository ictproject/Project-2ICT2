<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3><?php if(isset($this->variables['Group']) && array_key_exists('name', (array) $this->variables['Group'])) { echo $this->variables['Group']['name']; } else { ?>{$Group.name}<?php } ?></h3>
<!--if user no admin show the button join or leave-->
<?php if(!isset($this->variables['oUserIsAdmin']) || count($this->variables['oUserIsAdmin']) == 0 || $this->variables['oUserIsAdmin'] == '' || $this->variables['oUserIsAdmin'] === false): ?>
    <?php if(!isset($this->variables['oJoin']) || count($this->variables['oJoin']) == 0 || $this->variables['oJoin'] == '' || $this->variables['oJoin'] === false): ?><a href="groupPageNormalUser.php?id=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>&join=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>" id="btnJoin">Join</a><?php endif; ?> 
    <?php
					if(isset($this->variables['oJoin']) && count($this->variables['oJoin']) != 0 && $this->variables['oJoin'] != '' && $this->variables['oJoin'] !== false)
					{
						?><a href="groupPageNormalUser.php?id=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>&leave=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>" id="btnLeave">Leave</a><?php } ?>
<?php endif; ?>
<?php
					if(isset($this->variables['oUserIsAdmin']) && count($this->variables['oUserIsAdmin']) != 0 && $this->variables['oUserIsAdmin'] != '' && $this->variables['oUserIsAdmin'] !== false)
					{
						?><!-- user is admin no buttons --><?php } ?>
<br />
<br />
<br />

<p id="admin">admin: <a href="profile.php?id=<?php if(isset($this->variables['admin']) && array_key_exists('id', (array) $this->variables['admin'])) { echo $this->variables['admin']['id']; } else { ?>{$admin.id}<?php } ?>"><?php if(isset($this->variables['admin']) && array_key_exists('username', (array) $this->variables['admin'])) { echo $this->variables['admin']['username']; } else { ?>{$admin.username}<?php } ?></a></p>

<h4>Presentations</h4>

<div id="presentations">
        <div id="scroll">
            <?php
					if(!isset($this->variables['iPresentations']))
					{
						?>{iteration:iPresentations}<?php
						$this->variables['iPresentations'] = array();
						$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iPresentations'})) $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['old'] = ${'iPresentations'};
				$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['iteration'] = $this->variables['iPresentations'];
				$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['i'] = 1;
				$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['count'] = count($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['iteration'] as ${'iPresentations'})
				{
					if(!isset(${'iPresentations'}['first']) && $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['i'] == 1) ${'iPresentations'}['first'] = true;
					if(!isset(${'iPresentations'}['last']) && $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['i'] == $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['count']) ${'iPresentations'}['last'] = true;
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
					$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['fail']) && $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iPresentations}<?php
					}
				if(isset($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['old'])) ${'iPresentations'} = $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']['old'];
				else unset($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_1']);
				?>
        </div>
</div>

<div id="Description">
        <h4>Description</h4>

        <p id="descriptionText">
                <?php if(isset($this->variables['Group']) && array_key_exists('description', (array) $this->variables['Group'])) { echo $this->variables['Group']['description']; } else { ?>{$Group.description}<?php } ?>
        </p>
</div>

<div id="Members">
        <h4>Members (<?php if(array_key_exists('NumberOfMembers', (array) $this->variables)) { echo $this->variables['NumberOfMembers']; } else { ?>{$NumberOfMembers}<?php } ?>)</h4>

        <div id="images" class="clearfix">
            <?php
					if(!isset($this->variables['iMembers']))
					{
						?>{iteration:iMembers}<?php
						$this->variables['iMembers'] = array();
						$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['fail'] = true;
					}
				if(isset(${'iMembers'})) $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['old'] = ${'iMembers'};
				$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['iteration'] = $this->variables['iMembers'];
				$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['i'] = 1;
				$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['count'] = count($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['iteration']);
				foreach((array) $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['iteration'] as ${'iMembers'})
				{
					if(!isset(${'iMembers'}['first']) && $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['i'] == 1) ${'iMembers'}['first'] = true;
					if(!isset(${'iMembers'}['last']) && $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['i'] == $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['count']) ${'iMembers'}['last'] = true;
					if(isset(${'iMembers'}['formElements']) && is_array(${'iMembers'}['formElements']))
					{
						foreach(${'iMembers'}['formElements'] as $name => $object)
						{
							${'iMembers'}[$name] = $object->parse();
							${'iMembers'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
                <div id="imgBox">
                        <a href="profile.php?id=<?php if(array_key_exists('id', (array) ${'iMembers'})) { echo ${'iMembers'}['id']; } else { ?>{$iMembers->id}<?php } ?>" ><img src="./files/users/<?php if(array_key_exists('username', (array) ${'iMembers'})) { echo ${'iMembers'}['username']; } else { ?>{$iMembers->username}<?php } ?>/<?php if(array_key_exists('profile_picture', (array) ${'iMembers'})) { echo ${'iMembers'}['profile_picture']; } else { ?>{$iMembers->profile_picture}<?php } ?>" width="95" height="148" alt="img" /></a>
                        <p><?php if(array_key_exists('username', (array) ${'iMembers'})) { echo ${'iMembers'}['username']; } else { ?>{$iMembers->username}<?php } ?></p>
                </div>
            <?php
					$this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['i']++;
				}
					if(isset($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['fail']) && $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['fail'] == true)
					{
						?>{/iteration:iMembers}<?php
					}
				if(isset($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['old'])) ${'iMembers'} = $this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']['old'];
				else unset($this->iterations['726617182d13416f8645c2e8cc9c58e0_groupPageNormalUser.tpl.php_2']);
				?>
        </div>
</div>
</div>