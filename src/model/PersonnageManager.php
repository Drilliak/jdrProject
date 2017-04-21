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
