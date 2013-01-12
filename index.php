<?php
// Redirection vers la page d'install dans le sous dossier 'install'
$redirect = "Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/install/install.php";
header("$redirect");
exit;
?>