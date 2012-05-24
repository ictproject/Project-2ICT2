<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
			<h3>My Presentations</h3>

			<p id="add"><a href="createPresentation.php">Add Presentation</a></p>

			<div id="presentations" class="clearfix">
			<?php
					if(isset($this->variables['oPresentations']) && count($this->variables['oPresentations']) != 0 && $this->variables['oPresentations'] != '' && $this->variables['oPresentations'] !== false)
					{
						?>
                            <?php
					if(!isset($this->variables['iPresentations']))
					{
						?>{iteration:iPresentations}<?php
						$this->variables['iPresentations'] = array();
						$this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iPresentations'})) $this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['old'] = ${'iPresentations'};
				$this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['iteration'] = $this->variables['iPresentations'];
				$this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['i'] = 1;
				$this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['count'] = count($this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['iteration'] as ${'iPresentations'})
				{
					if(!isset(${'iPresentations'}['first']) && $this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['i'] == 1) ${'iPresentations'}['first'] = true;
					if(!isset(${'iPresentations'}['last']) && $this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['i'] == $this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['count']) ${'iPresentations'}['last'] = true;
					if(isset(${'iPresentations'}['formElements']) && is_array(${'iPresentations'}['formElements']))
					{
						foreach(${'iPresentations'}['formElements'] as $name => $object)
						{
							${'iPresentations'}[$name] = $object->parse();
							${'iPresentations'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
				<div class="presentation" onclick="location.href='presentation.php?p=<?php if(array_key_exists('id', (array) ${'iPresentations'})) { echo ${'iPresentations'}['id']; } else { ?>{$iPresentations->id}<?php } ?>';" style="cursor:pointer;">
					<h4><?php if(array_key_exists('name', (array) ${'iPresentations'})) { echo ${'iPresentations'}['name']; } else { ?>{$iPresentations->name}<?php } ?></h4>
					<p class="buttons">
						<a href="slideEditor.php?Pid=<?php if(array_key_exists('id', (array) ${'iPresentations'})) { echo ${'iPresentations'}['id']; } else { ?>{$iPresentations->id}<?php } ?>" class="settings">settings</a>
						<a href="slideEditor.php?Pid=<?php if(array_key_exists('id', (array) ${'iPresentations'})) { echo ${'iPresentations'}['id']; } else { ?>{$iPresentations->id}<?php } ?>" class="edit">edit</a>
					</p>
				</div>
                            <?php
					$this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['fail']) && $this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iPresentations}<?php
					}
				if(isset($this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['old'])) ${'iPresentations'} = $this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']['old'];
				else unset($this->iterations['ea133c34392264b891abcd46ab323128_myPresentations.tpl.php_1']);
				?>
             <?php } ?>
             <?php if(!isset($this->variables['oPresentations']) || count($this->variables['oPresentations']) == 0 || $this->variables['oPresentations'] == '' || $this->variables['oPresentations'] === false): ?>
             <p>U have no presentations</p>
             <?php endif; ?>
			</div>