<?php


include "../functions/functions.php";
include "../components/Routes.php";
include "../components/Flash.php";

$config = include "../config.php";
Routes::page($config['routes']);


$db = include "../database/start.php";
$user = $db->getOne('users', 1);


$users = $db->getAll('users');


include "../view/page.php";