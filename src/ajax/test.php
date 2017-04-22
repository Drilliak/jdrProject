<?php

include_once "../../Autoloader.php";
Autoloader::register();

use Src\Model\MessageManager;
use Src\Model\DBFactory;


$messageManaer = new MessageManager(DBFactory::getPDOConnection());
try{
    var_dump(json_encode($messageManaer->getLastMessages(3)));
} catch(PDOException $e){
    echo $e->getMessage();
}
