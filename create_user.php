<?php
$db = require_once "database/start.php";
require_once "components/Input.php";
require_once "components/Validator.php";
require_once "components/Flash.php";
$username = $_POST['username'];
$email = $_POST['email'];

if (Input::exists()) {
    $validation = new Validator($db);

    $validation->check($_POST, [
        'username' => [
            'required' => true,
            'min' => 2,
            'max' => 30,
            'unique' => 'users'
        ],
        'email' => [
            'required' => true,
            'email' => true
        ]
    ]);


    if ($validation->passed()) {
        $db->insert('users', [
            'username' => Input::get('username'),
            'email' => Input::get('email')
        ]);
        Flash::set('success', 'User successfully created.');
        header('Location: /');
    } else {
        Flash::set('danger', 'Error. Please check your data.' . $validation->errors_ul_html());
        header('Location: /create');
    }
}

