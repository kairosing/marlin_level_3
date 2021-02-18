<?php
session_start();

class Flash
{

    public static function set($name, $message){
        $_SESSION[$name] = $message;
    }

    public static function exists($name){
        return (isset($_SESSION[$name])) ? true : false; //&& $_SESSION[$name] !== ''
    }

    public static function display($name){
        if (self::exists($name)) {
            $flash_message = $_SESSION[$name];
            unset($_SESSION[$name]);
            return $flash_message;
        }
    }


    public static function delete($name){
        if (self::exists($name)){
            unset($_SESSION[$name]);
        }
    }

    public static function get($name){
        return $_SESSION[$name];
    }


    public static function flashString($name, $string = ''){
        if (self::exists($name) && self::get($name) !== ''){
            $session = self::get($name);
            self::delete($name);
            return $session;
        }else {
            self::set($name, $string);
        }
    }

    public static function flashExists($name){
        return self::exists($name) && self::get($name) != '';
    }
}