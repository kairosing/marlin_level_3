<?php

return [

    "database" => [
        "database" => "app3",
        "username" => "root",
        "password" => "",
        "connection" => "mysql:host=localhost"
    ],

    "routes" => [
        "/" => '../view/page.php',
        "/about" => '../functions/about.php',
        "/edit" => '../view/edit.php',
        "/create" => '../view/create.php',
        "/delete" => '../view/delete.php',
        "/show" => '../show.php',
        "/404" => '../404/404.php',
        "/create_user" => '../create_user.php',
        "/edit_user" => '../edit_user.php',

    ],
];