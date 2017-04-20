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

        $data = $q->fetch(PDO::FETCH_ASSOC);
        return new Personnage($data);
    }
    
}

var_dump((new PersonnageManager(DBFactory::getPDOConnection()))->get(1));