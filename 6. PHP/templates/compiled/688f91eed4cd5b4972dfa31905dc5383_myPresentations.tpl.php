<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
			<h3>My Presentations</h3>

			<p id="add"><a href="#">Add Presentation</a></p>

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
						$this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['fail'] = true;
					}
				if(isset(${'iPresentations'})) $this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['old'] = ${'iPresentations'};
				$this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['iteration'] = $this->variables['iPresentations'];
				$this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['i'] = 1;
				$this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['count'] = count($this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['iteration'] as ${'iPresentations'})
				{
					if(!isset(${'iPresentations'}['first']) && $this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['i'] == 1) ${'iPresentations'}['first'] = true;
					if(!isset(${'iPresentations'}['last']) && $this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['i'] == $this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['count']) ${'iPresentations'}['last'] = true;
					if(isset(${'iPresentations'}['formElements']) && is_array(${'iPresentations'}['formElements']))
					{
						foreach(${'iPresentations'}['formElements'] as $name => $object)
						{
							${'iPresentations'}[$name] = $object->parse();
							${'iPresentations'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
				<div class="presentation">
					<h4><?php if(array_key_exists('name', (array) ${'iPresentations'})) { echo ${'iPresentations'}['name']; } else { ?>{$iPresentations->name}<?php } ?></h4>
					<p class="buttons">
						<a href="#" class="settings">settings</a>
						<a href="#" class="edit">edit</a>
					</p>
				</div>
                            <?php
					$this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['fail']) && $this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:iPresentations}<?php
					}
				if(isset($this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['old'])) ${'iPresentations'} = $this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']['old'];
				else unset($this->iterations['688f91eed4cd5b4972dfa31905dc5383_myPresentations.tpl.php_1']);
				?>
             <?php } ?>
             <?php if(!isset($this->variables['oPresentations']) || count($this->variables['oPresentations']) == 0 || $this->variables['oPresentations'] == '' || $this->variables['oPresentations'] === false): ?>
             <p>U have no presentations</p>
             <?php endif; ?>
			</div>