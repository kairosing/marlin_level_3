<?php


include "../functions/functions.php";
$db = include "../database/start.php";


$users = $db->getAll('users');


include "../view/page.php";