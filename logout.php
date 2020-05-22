<?php session_start();

$_SESSION['user_id'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;
$_SESSION['user_status'] = null;
$_SESSION['user_active'] = null;
$_SESSION['mobile'] = null;
$_SESSION['email'] = null;
$_SESSION['user_city'] = null;

header("Location: ./index.php");


?>