<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Register</h3>
<?php if(array_key_exists('frmRegister', (array) $this->variables)) { echo $this->variables['frmRegister']; } else { ?>{$frmRegister}<?php } ?>