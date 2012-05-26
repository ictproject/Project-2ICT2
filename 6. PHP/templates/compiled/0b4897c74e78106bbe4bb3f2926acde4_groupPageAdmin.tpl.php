<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3><?php if(isset($this->variables['Group']) && array_key_exists('name', (array) $this->variables['Group'])) { echo $this->variables['Group']['name']; } else { ?>{$Group.name}<?php } ?></h3>
<p class="edit"><a href="#" onclick="toggle_visibility('editTitle');">Edit</a></p>
<form action="#" method="post" id="editTitle">
    <input type="text" name="txtTitle" value="<?php if(isset($this->variables['Group']) && array_key_exists('name', (array) $this->variables['Group'])) { echo $this->variables['Group']['name']; } else { ?>{$Group.name}<?php } ?>" />
    <input type="submit" value="Edit" />
</form>
<a href="groupPageAdmin.php?id=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>&DeleteGroupId=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>" id="btnDeleteGroup">Delete</a>
<p id="admin">admin: <a href="profile.php?id=<?php if(isset($this->variables['admin']) && array_key_exists('id', (array) $this->variables['admin'])) { echo $this->variables['admin']['id']; } else { ?>{$admin.id}<?php } ?>"><?php if(isset($this->variables['admin']) && array_key_exists('username', (array) $this->variables['admin'])) { echo $this->variables['admin']['username']; } else { ?>{$admin.username}<?php } ?></a></p>

<h4>Presentations</h4>

<p id="normalView"><a href="groupPageNormalUser.php?id=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>">back to normal view</a></p>


<div id="presentations">
        <div id="scroll">
            <?php
					if(!isset($this->variables['iPresentations']))
					{
						?>{iteration:iPresentations}<?php
						$this->variables['iPresentations'] = array();
						$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iPresentations'})) $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['old'] = ${'iPresentations'};
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['iteration'] = $this->variables['iPresentations'];
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['i'] = 1;
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['count'] = count($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['iteration'] as ${'iPresentations'})
				{
					if(!isset(${'iPresentations'}['first']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['i'] == 1) ${'iPresentations'}['first'] = true;
					if(!isset(${'iPresentations'}['last']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['i'] == $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['count']) ${'iPresentations'}['last'] = true;
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
                        <p class="buttons">
                                <a href="groupPageAdmin.php?id=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>&DeletePresId=<?php if(array_key_exists('id', (array) ${'iPresentations'})) { echo ${'iPresentations'}['id']; } else { ?>{$iPresentations->id}<?php } ?>" class="delete">delete</a>
                                <a href="createPresentationEdit.php?Pid=<?php if(array_key_exists('id', (array) ${'iPresentations'})) { echo ${'iPresentations'}['id']; } else { ?>{$iPresentations->id}<?php } ?>" class="settings">settings</a>
                                <a href="slideEditor.php?Pid=<?php if(array_key_exists('id', (array) ${'iPresentations'})) { echo ${'iPresentations'}['id']; } else { ?>{$iPresentations->id}<?php } ?>" class="edit">edit</a>
                        </p>
                </div>
            <?php
					$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['fail']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iPresentations}<?php
					}
				if(isset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['old'])) ${'iPresentations'} = $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']['old'];
				else unset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_1']);
				?>    
        </div>
</div>

<div id="Description">
        <h4>Description</h4>

        <p class="edit"><a href="#" onclick="toggle_visibility('editDescription');">Edit</a></p>
        <form action="#" method="post" id="editDescription">
            <textarea name="txtDescription" rows="10" cols="50">
                <?php if(isset($this->variables['Group']) && array_key_exists('description', (array) $this->variables['Group'])) { echo $this->variables['Group']['description']; } else { ?>{$Group.description}<?php } ?>
            </textarea>
            <input type="submit" value="Edit">
        </form>
        <p id="descriptionText">
                <?php if(isset($this->variables['Group']) && array_key_exists('description', (array) $this->variables['Group'])) { echo $this->variables['Group']['description']; } else { ?>{$Group.description}<?php } ?>
        </p>
</div>

<div id="Members">
        <h4>Members (<?php if(array_key_exists('NumberOfMembers', (array) $this->variables)) { echo $this->variables['NumberOfMembers']; } else { ?>{$NumberOfMembers}<?php } ?>)</h4>
        <a id="search" href="#" onclick="toggle_visibility('searchUsers'); toggle_visibility('images');">Invite</a>

        <form action="#" method="post" id="searchUsers">
            <input type=search results=5 name='search' placeholder="Search ..." />
            <input type="submit" name="searchButton" value="Search" >
            <div id="AllUsers">
                <div id="scroll">
                    <?php
					if(!isset($this->variables['iAllUsers']))
					{
						?>{iteration:iAllUsers}<?php
						$this->variables['iAllUsers'] = array();
						$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['fail'] = true;
					}
				if(isset(${'iAllUsers'})) $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['old'] = ${'iAllUsers'};
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['iteration'] = $this->variables['iAllUsers'];
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['i'] = 1;
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['count'] = count($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['iteration']);
				foreach((array) $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['iteration'] as ${'iAllUsers'})
				{
					if(!isset(${'iAllUsers'}['first']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['i'] == 1) ${'iAllUsers'}['first'] = true;
					if(!isset(${'iAllUsers'}['last']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['i'] == $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['count']) ${'iAllUsers'}['last'] = true;
					if(isset(${'iAllUsers'}['formElements']) && is_array(${'iAllUsers'}['formElements']))
					{
						foreach(${'iAllUsers'}['formElements'] as $name => $object)
						{
							${'iAllUsers'}[$name] = $object->parse();
							${'iAllUsers'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
                        <p class="group"><input type="checkbox" name='users[]' value="<?php if(array_key_exists('id', (array) ${'iAllUsers'})) { echo ${'iAllUsers'}['id']; } else { ?>{$iAllUsers->id}<?php } ?>" /><a href="profile.php?id=<?php if(array_key_exists('id', (array) ${'iAllUsers'})) { echo ${'iAllUsers'}['id']; } else { ?>{$iAllUsers->id}<?php } ?>"><?php if(array_key_exists('username', (array) ${'iAllUsers'})) { echo ${'iAllUsers'}['username']; } else { ?>{$iAllUsers->username}<?php } ?></a></p>
                    <?php
					$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['i']++;
				}
					if(isset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['fail']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['fail'] == true)
					{
						?>{/iteration:iAllUsers}<?php
					}
				if(isset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['old'])) ${'iAllUsers'} = $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']['old'];
				else unset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_2']);
				?>
                </div>
            </div>
            <input type="submit" name="Add" value="Add" >
        </form>

        <div id="images" class="clearfix">
            <?php
					if(!isset($this->variables['iMembers']))
					{
						?>{iteration:iMembers}<?php
						$this->variables['iMembers'] = array();
						$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['fail'] = true;
					}
				if(isset(${'iMembers'})) $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['old'] = ${'iMembers'};
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['iteration'] = $this->variables['iMembers'];
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['i'] = 1;
				$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['count'] = count($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['iteration']);
				foreach((array) $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['iteration'] as ${'iMembers'})
				{
					if(!isset(${'iMembers'}['first']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['i'] == 1) ${'iMembers'}['first'] = true;
					if(!isset(${'iMembers'}['last']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['i'] == $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['count']) ${'iMembers'}['last'] = true;
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
                        <a class="delete" href="groupPageAdmin.php?id=<?php if(isset($this->variables['Group']) && array_key_exists('id', (array) $this->variables['Group'])) { echo $this->variables['Group']['id']; } else { ?>{$Group.id}<?php } ?>&UserId=<?php if(array_key_exists('id', (array) ${'iMembers'})) { echo ${'iMembers'}['id']; } else { ?>{$iMembers->id}<?php } ?>" ></a>
                        <p><?php if(array_key_exists('username', (array) ${'iMembers'})) { echo ${'iMembers'}['username']; } else { ?>{$iMembers->username}<?php } ?></p>
                </div>
                
            <?php
					$this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['i']++;
				}
					if(isset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['fail']) && $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['fail'] == true)
					{
						?>{/iteration:iMembers}<?php
					}
				if(isset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['old'])) ${'iMembers'} = $this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']['old'];
				else unset($this->iterations['0b4897c74e78106bbe4bb3f2926acde4_groupPageAdmin.tpl.php_3']);
				?>
        </div>
</div>
	  	