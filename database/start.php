<?php
$config = include __DIR__ . "/../config.php";
require_once "QueryBuilder.php";
require_once "Connection.php";

return new QueryBuilder(Connection::make($config['database']));