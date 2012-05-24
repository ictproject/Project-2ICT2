<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<h3>Login</h3>

<?php if(array_key_exists('frmLogin', (array) $this->variables)) { echo $this->variables['frmLogin']; } else { ?>{$frmLogin}<?php } ?>