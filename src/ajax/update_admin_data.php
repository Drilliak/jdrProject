<?php
include_once '../../Autoloader.php';
Autoloader::register();

use Src\Model\DBFactory;
use Src\Model\PersonnageManager;

if (!empty($_POST)){
    $db = DBFactory::getPDOConnection();
    $personnageManager = new PersonnageManager($db);

    $id = $_POST["id_personnage"];
    $changedAttr = $_POST['changedAttr'];
    $changedVal = $_POST['changedVal'];
    $personnageManager->update($id, $changedAttr, $changedVal);
}
