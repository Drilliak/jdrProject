<?php
namespace Src\Model;

require_once "../../Autoloader.php";
\Autoloader::register();

use Src\Model\PersonnageManager;
use Src\Model\User;
use Src\Model\Manager;

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

    /**
     * @param $entity
     * @return TRUE if the user with the name and the password passed as parameters exist, FALSE otherwise.
     */
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
        $res = $req->fetch(\PDO::FETCH_ASSOC);
        if ($res !== false){
            return new User($res);
        }

    }

    /**
     * Retourne un tableau contenant tous les utilisateur ayant le rôle "player" dans la BDD.
     * Le tableau contient les indices 'name' et 'id_personnage'
     * @return array
     */
    public function getPlayers(){
        $req = $this->db->prepare('SELECT name, id_personnage FROM ' . self::USER_TABLE . ' WHERE role = "player"');
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }


    /**
     * Renvoie le personnage associé à l'utilisateur ayant le nom passé en paramètre.
     *
     * @param $name
     * @return Personnage
     */
    public function getPersonnage($name){
        $req = $this->db->prepare('SELECT id_personnage FROM ' . self::USER_TABLE . ' WHERE name = :name');
        $req->execute(array(
            'name' => $name
        ));
        $idPersonnage = $req->fetch(\PDO::FETCH_ASSOC)['id_personnage'];

        $req = $this->db->prepare('SELECT * FROM ' . PersonnageManager::PERSONNAGE_TABLE . ' WHERE id = :id');
        $req->execute(array(
            'id' => $idPersonnage
        ));

        return new Personnage($req->fetch(\PDO::FETCH_ASSOC));
    }
}