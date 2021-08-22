<?php 
require_once 'admin/core/init.php';

$id = $_SESSION["id"];
$_SESSION["log"] = []; 
$_SESSION["id"] = []; 
$_SESSION["role"] = [];

unset( $_SESSION["log"] );
unset( $_SESSION["id"] );
unset( $_SESSION["role"] );

setcookie(hash('md5', 'rememberme'), $id, time()-3600);

header('Location: index.php');