<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$to = "tbush0045@crprairie.org";
mail($to, 'PHP Test E-mail', 'This is a test e-mail ' . date('r'), ['From: server@'.php_uname('n')]);  
echo "Test email sent";
?>
