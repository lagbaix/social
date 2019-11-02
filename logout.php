<?php 
session_start();
session_destroy();

$_SESSION = [];

header('Loacation: login.php');
exit;

?>