<?php
session_start();
session_destroy();

$uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');	
header("Location: http://".$_SERVER['HTTP_HOST']."/".$uri."/index.php");
exit();  
?>

