<?php

require_once "User.php";
require_once "Manager.php";

class UserManager extends Manager
{

    public function __construct($db)
    {
        parent::__construct($db);
    }

    /**
     * @param User $entity
     * @return bool TRUE on success or FALSE on failure
     */
    public function add($entity){
        $req = $this->db->prepare('INSERT INTO ' . self::USER_TABLE.'(name, password, role) VALUES(:name, :password, :role)');
        return $req->execute(array(
            "name" => $entity->getName(),
            "password" =>$entity->getPassword(),
            "role" => $entity->getRole()
        ));
    }

    public function exist($entity){
        $req = $this->db->prepare('SELECT id FROM ' . self::USER_TABLE. ' WHERE name = :name AND password = :password');
        $req->execute(array(
            "name" =>$entity->getName(),
            "password" =>$entity->getPassword()
        ));
        $res = $req->fetch();
        if (!$res){
            return false;
        } else {
            return true;
        }
    }
    public function delete($entity)
    {
        $req = $this->db->prepare('DELETE FROM '.self::USER_TABLE.' WHERE id = :id');
        return($req->execute(array(
            "id" => $entity->getId()
        )));

    }

    public function get($username, $hashedPassword){
        $req = $this->db->prepare('SELECT * FROM ' . self::USER_TABLE. ' WHERE name = :name AND password = :password');
        $req->execute(array(
            "name" =>$username,
            "password" =>$hashedPassword
        ));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res !== false){
            return new User($res);
        }

    }
}