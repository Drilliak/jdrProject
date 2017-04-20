<?php

namespace Src\Model;

class DBFactory{

    const HOST = "localhost";
    const DB_NAME = "jdr";
    const USERNAME = "root";
    const PASSWORD = "";

    public static function getPDOConnection()
    {
        $db = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME, self::USERNAME, self::PASSWORD);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

}