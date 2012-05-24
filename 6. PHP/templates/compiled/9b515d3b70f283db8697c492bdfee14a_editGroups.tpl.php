<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Edit groups</h3>

<div id="groups">
        <h4>My groups</h4>
        <span>hidden</span>
        <?php
					if(!isset($this->variables['iGroups']))
					{
						?>{iteration:iGroups}<?php
						$this->variables['iGroups'] = array();
						$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iGroups'})) $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['old'] = ${'iGroups'};
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['iteration'] = $this->variables['iGroups'];
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['i'] = 1;
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['count'] = count($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['iteration'] as ${'iGroups'})
				{
					if(!isset(${'iGroups'}['first']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['i'] == 1) ${'iGroups'}['first'] = true;
					if(!isset(${'iGroups'}['last']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['i'] == $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['count']) ${'iGroups'}['last'] = true;
					if(isset(${'iGroups'}['formElements']) && is_array(${'iGroups'}['formElements']))
					{
						foreach(${'iGroups'}['formElements'] as $name => $object)
						{
							${'iGroups'}[$name] = $object->parse();
							${'iGroups'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
        <p class="group"><a href="groupPageNormalUser.php?id=<?php if(array_key_exists('id', (array) ${'iGroups'})) { echo ${'iGroups'}['id']; } else { ?>{$iGroups->id}<?php } ?>"><?php if(array_key_exists('name', (array) ${'iGroups'})) { echo ${'iGroups'}['name']; } else { ?>{$iGroups->name}<?php } ?></a><a href="editGroups.php?userId=<?php if(isset($this->variables['user']) && array_key_exists('id', (array) $this->variables['user'])) { echo $this->variables['user']['id']; } else { ?>{$user.id}<?php } ?>&groupId=<?php if(array_key_exists('id', (array) ${'iGroups'})) { echo ${'iGroups'}['id']; } else { ?>{$iGroups->id}<?php } ?>" class="DeleteGroup"><img src="core/img/delete.png" alt="delete" /></a></p>
        <?php
					$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['fail']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iGroups}<?php
					}
				if(isset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['old'])) ${'iGroups'} = $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']['old'];
				else unset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_1']);
				?>
</div>
<div id="groups">
        <div id="createGroup">
                <h4 >Created groups</h4>
                <p class="create"><a href="createGroup.php">Create</a></p>
        </div>
        <span>hidden</span>
        <?php
					if(!isset($this->variables['iCreatedGroups']))
					{
						?>{iteration:iCreatedGroups}<?php
						$this->variables['iCreatedGroups'] = array();
						$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['fail'] = true;
					}
				if(isset(${'iCreatedGroups'})) $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['old'] = ${'iCreatedGroups'};
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['iteration'] = $this->variables['iCreatedGroups'];
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['i'] = 1;
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['count'] = count($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['iteration']);
				foreach((array) $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['iteration'] as ${'iCreatedGroups'})
				{
					if(!isset(${'iCreatedGroups'}['first']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['i'] == 1) ${'iCreatedGroups'}['first'] = true;
					if(!isset(${'iCreatedGroups'}['last']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['i'] == $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['count']) ${'iCreatedGroups'}['last'] = true;
					if(isset(${'iCreatedGroups'}['formElements']) && is_array(${'iCreatedGroups'}['formElements']))
					{
						foreach(${'iCreatedGroups'}['formElements'] as $name => $object)
						{
							${'iCreatedGroups'}[$name] = $object->parse();
							${'iCreatedGroups'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
            <p class="group"><a href="groupPageAdmin.php?id=<?php if(array_key_exists('id', (array) ${'iCreatedGroups'})) { echo ${'iCreatedGroups'}['id']; } else { ?>{$iCreatedGroups->id}<?php } ?>"><?php if(array_key_exists('name', (array) ${'iCreatedGroups'})) { echo ${'iCreatedGroups'}['name']; } else { ?>{$iCreatedGroups->name}<?php } ?></a><!--<a href="groupPage.php?group=<?php if(array_key_exists('id', (array) ${'iCreatedGroups'})) { echo ${'iCreatedGroups'}['id']; } else { ?>{$iCreatedGroups->id}<?php } ?>" class="EditGroup"><img src="core/img/edit.png" alt="edit" />--></a></p>
        <?php
					$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['i']++;
				}
					if(isset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['fail']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['fail'] == true)
					{
						?>{/iteration:iCreatedGroups}<?php
					}
				if(isset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['old'])) ${'iCreatedGroups'} = $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']['old'];
				else unset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_2']);
				?>

</div>
<div id="groups">
        <h4>Join a group</h4>
        
        <form method="post">
            <input type=search results=5 name=search placeholder="Search ..." />
            <input type="submit" name="action" value="None" style="display: none">
        </form>
        <span>hidden</span>
        <div id="joinGroup">
            <div id="scroll">
                <?php
					if(!isset($this->variables['iAllGroups']))
					{
						?>{iteration:iAllGroups}<?php
						$this->variables['iAllGroups'] = array();
						$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['fail'] = true;
					}
				if(isset(${'iAllGroups'})) $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['old'] = ${'iAllGroups'};
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['iteration'] = $this->variables['iAllGroups'];
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['i'] = 1;
				$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['count'] = count($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['iteration']);
				foreach((array) $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['iteration'] as ${'iAllGroups'})
				{
					if(!isset(${'iAllGroups'}['first']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['i'] == 1) ${'iAllGroups'}['first'] = true;
					if(!isset(${'iAllGroups'}['last']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['i'] == $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['count']) ${'iAllGroups'}['last'] = true;
					if(isset(${'iAllGroups'}['formElements']) && is_array(${'iAllGroups'}['formElements']))
					{
						foreach(${'iAllGroups'}['formElements'] as $name => $object)
						{
							${'iAllGroups'}[$name] = $object->parse();
							${'iAllGroups'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
                    <p class="group"><a href="groupPageNormalUser.php?id=<?php if(array_key_exists('id', (array) ${'iAllGroups'})) { echo ${'iAllGroups'}['id']; } else { ?>{$iAllGroups->id}<?php } ?>"><?php if(array_key_exists('name', (array) ${'iAllGroups'})) { echo ${'iAllGroups'}['name']; } else { ?>{$iAllGroups->name}<?php } ?></a></p>
                <?php
					$this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['i']++;
				}
					if(isset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['fail']) && $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['fail'] == true)
					{
						?>{/iteration:iAllGroups}<?php
					}
				if(isset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['old'])) ${'iAllGroups'} = $this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']['old'];
				else unset($this->iterations['9b515d3b70f283db8697c492bdfee14a_editGroups.tpl.php_3']);
				?>
            </div>
       </div>
</div>
