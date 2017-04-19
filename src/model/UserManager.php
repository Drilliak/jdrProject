<?php

require_once "User.php";

class UserManager
{
    const TABLE_NAME = "user";

    /**
     * @var PDO PDO instance
     */
    private $db;



    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @param User $user
     * @return bool TRUE on success or FALSE on failure
     */
    public function add(User $user){
        $req = $this->db->prepare('INSERT INTO ' . self::TABLE_NAME .'(name, password, role) VALUES(:name, :password, :role)');
        return $req->execute(array(
            "name" => $user->getName(),
            "password" =>$user->getPassword(),
            "role" => $user->getRole()
        ));
    }

    public function exist(User $user){
        $req = $this->db->prepare('SELECT id FROM ' . self::TABLE_NAME . ' WHERE name = :name AND password = :password');
        $req->execute(array(
            "name" =>$user->getName(),
            "password" =>$user->getPassword()
        ));
        $res = $req->fetch();
        if (!$res){
            return false;
        } else {
            return true;
        }
    }

    public function get($username, $hashedPassword){
        $req = $this->db->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE name = :name AND password = :password');
        $req->execute(array(
            "name" =>$username,
            "password" =>$hashedPassword
        ));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res !== false){
            return new User($res);
        }

    }

    public function delete(User $user){

    }
}