cd /theme/header.php	Here is header.
<?php
echo Slim::urlFor('app',array('app'=>'css','action'=>'index'));
?>