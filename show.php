<?php
include "./functions/functions.php";
$db = include "./database/start.php";

$id = $_GET['id'];
$user = $db->getOne('users', $id);

?>

<h1><?php echo $user['username'];?></h1>
