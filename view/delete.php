<?php
include "../functions/functions.php";
$db = include "../database/start.php";

$id = $_GET['id'];
$db->delete('users', $id);

header("Location: /proekt/public");