<?php

$db = require_once "./database/start.php";

$db->create('users', [
        'username' => $_POST['username'],
        'email' => $_POST['email']

    ]);

header('Location: /');