<?php

class Connection {


   public static function make($config)
    {

        return new PDO("{$config['connection']};dbname={$config['database']}", $config['username'], $config['password']);

    }
}