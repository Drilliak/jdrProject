<?php

namespace Src\Model;

require_once "../../Autoloader.php";
\Autoloader::register();

use Src\Model\Manager;
use Src\Model\DBFactory;
use Src\Model\Personnage;

class PersonnageManager extends Manager
{
    
    function __construct($db)
    {
        parent::__construct($db);
    }
    public function add($entity)
    {

    }
    public function exist($entity)
    {

    }
    public function delete($entity)
    {

    }

    public function get($id){
        $q = $this->db->prepare("SELECT * FROM " . self::PERSONNAGE_TABLE . " WHERE id = :id");
        $q->execute(array(
           "id" => $id
        ));

        $data = $q->fetch(\PDO::FETCH_ASSOC);
        return new Personnage($data);
    }

    /**
     * Retourne les pv et le mana de tous les joueurs
     */
    public function getHpAndManaOtherPlayers($username){

        $q = $this->db->prepare("SELECT nom, titre, hp, mana, statPhysique, statMagie FROM " . self::PERSONNAGE_TABLE );
        $q->execute();
        $sqlRes = $q->fetchAll(\PDO::FETCH_ASSOC);
        $res = array();
        foreach ($sqlRes as $personnage){
            $res[$personnage['nom']] = $personnage;
        }

        return $res;
    }

    /**
     * Met à jour la veleur d'un personnage identifié par son id
     * @param $id
     * @param $attribute
     * @param $value
     * @return bool TRUE on success or FALESE on failure
     */
    public function update($id, $attribute, $value){
        $q = $this->db->prepare("UPDATE " . self::PERSONNAGE_TABLE . " set " . $attribute . " = :value WHERE id = :id");
        return $q->execute(array(
           "value" => $value,
            "id" => $id
        ));


    }
    
}
