<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Create Presentation</h3>

			<p id="info">Provide the information for your presentation here. You can still change it afterwards.</p>
                        <?php if(array_key_exists('frmCreatePresentation', (array) $this->variables)) { echo $this->variables['frmCreatePresentation']; } else { ?>{$frmCreatePresentation}<?php } ?>