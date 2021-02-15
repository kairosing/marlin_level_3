<?php

include "./functions/functions.php";
$db = include "./database/start.php";

$db->create('users', [
        'username' => $_POST['username'],
        'email' => $_POST['email']

    ]);

header('Location: /proekt/public');