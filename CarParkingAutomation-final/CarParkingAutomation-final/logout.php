<?php
include_once 'db.php';
include_once 'user.php';

$user = new User();
$closeSession = $user->logout($pdo);
header("Location: index.php");

?>