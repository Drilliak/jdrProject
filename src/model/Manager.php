<?php

namespace Src\Model;


abstract class Manager
{
    const USER_TABLE = 'user';
    const PERSONNAGE_TABLE = 'personnage';
    /**
    * @var \PDO PDO instance
    */
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    abstract public function add($entity);
    abstract public function exist($entity);
    abstract public function delete($entity);
}