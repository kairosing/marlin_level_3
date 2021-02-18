<?php

$db = require_once "database/start.php";



$db->update('users', [
    'username' => $_POST['username'],
    'email' => $_POST['email']
], $_GET['id']);

header("Location: /");