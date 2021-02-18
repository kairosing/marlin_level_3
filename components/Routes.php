<?php


class Routes
{
    public static function page($config){


        $parsed_url = parse_url($_SERVER['REQUEST_URI']);

        $path = $parsed_url['path'];



        if(array_key_exists($path, $config)){
        require_once $config[$path]; exit;

        } else {
            header('Location: /404');
        }

        }

}