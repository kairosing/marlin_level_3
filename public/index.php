<?php

require_once "../components/Routes.php";
require_once "../components/Flash.php";
require_once "../components/Input.php";
require_once "../components/Validator.php";

$config = require_once "../config.php";

Routes::page($config['routes']);



$db = require_once "../database/start.php";
$user = $db->getOne('users', 1);


$users = $db->getAll('users');
var_dump();

require_once "../view/page.php";