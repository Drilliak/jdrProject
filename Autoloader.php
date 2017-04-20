<?php

class Autoloader
{

    static function autoload($class){
        $tab = explode("\\", $class);
        for ($i = 0; $i <count($tab) -1 ; $i++) {
            $tab[$i] = strtolower($tab[$i]);
        }
        $class = implode("\\", $tab);
        $path = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        require_once __DIR__ . DIRECTORY_SEPARATOR .  $path .'.php';
    }

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}
