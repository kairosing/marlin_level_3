<?php
$db = require_once "../database/start.php";

$id = $_GET['id'];
$db->delete('users', $id);

header("Location: /");