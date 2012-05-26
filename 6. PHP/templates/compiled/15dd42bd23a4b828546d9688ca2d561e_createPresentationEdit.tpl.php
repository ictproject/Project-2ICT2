<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Edit Presentation</h3>

			<p id="info">Edit the information for your presentation here.</p>
                        <?php if(array_key_exists('frmCreatePresentationEdit', (array) $this->variables)) { echo $this->variables['frmCreatePresentationEdit']; } else { ?>{$frmCreatePresentationEdit}<?php } ?>