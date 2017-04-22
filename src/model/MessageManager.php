<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 22/04/2017
 * Time: 15:04
 */

namespace Src\Model;

use Src\Model\Manager;

class MessageManager extends Manager
{

    const MESSAGE_TABLE = "message";

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

    /**
     * Récupère les messages les plus récents (dont l'id est plus grand que le paramètre)
     * @param $id
     */
    public function getLastMessages($id){
        $q = $this->db->prepare('SELECT * FROM ' . self::MESSAGE_TABLE . ' WHERE id > :id ORDER BY id ASC');
        $q->execute(array(
            "id" => $id
        ));

        return $q->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addMessage($message){
        $q = $this->db->prepare('INSERT INTO ' . self::MESSAGE_TABLE .'(message) VALUES (:message)');
        return $q->execute(array(
            "message" => $message
        ));
    }
}