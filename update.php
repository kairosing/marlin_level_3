<?php
include "./functions/functions.php";
$db = include "./database/start.php";



$db->update('users', [
    'username' => $_POST['username'],
    'email' => $_POST['email']
], $_GET['id']);

header("Location: /proekt/public");