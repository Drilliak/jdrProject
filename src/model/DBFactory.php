<?php

namespace Src\Model;

class DBFactory{

    const HOST = "localhost";
    const DB_NAME = "jdr";
    const USERNAME = "root";
    const PASSWORD = "";

    const HOST_PROD = "db678753116.db.1and1.com";
    const DB_NAME_PROD = "db678753116";
    const USERNAME_PROD = "dbo678753116";
    const PASSWORD_PROD = "WinnerTeam42";

    const LOCAL_ADDR = array('127.0.0.1', "::1");

    public static function getPDOConnection()
    {
        if (in_array($_SERVER['REMOTE_ADDR'], self::LOCAL_ADDR)){
            $db = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME, self::USERNAME, self::PASSWORD);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $db;
        } else {
            $db = new \PDO('mysql:host=' . self::HOST_PROD .';dbname=' . self::DB_NAME_PROD, self::USERNAME_PROD, self::PASSWORD_PROD);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $db;
        }

    }

}