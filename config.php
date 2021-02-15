<?php




return [

    "database" => [
        "database" => "app3",
        "username" => "root",
        "password" => "",
        "connection" => "mysql:host=localhost"
    ],

    "routes" => [
        "/proekt/public/" => '../view/page.php',
        "/proekt/public/about" => '../functions/about.php',
        "/proekt/view/edit" => '../view/edit.php',

    ],
];