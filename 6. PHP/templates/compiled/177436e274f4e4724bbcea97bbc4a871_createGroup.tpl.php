<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Create Group</h3>
<?php if(array_key_exists('frmCreateGroup', (array) $this->variables)) { echo $this->variables['frmCreateGroup']; } else { ?>{$frmCreateGroup}<?php } ?>