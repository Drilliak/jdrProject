<?php

include_once "../../Autoloader.php";
Autoloader::register();

use Src\Model\UserManager;
use Src\Model\PersonnageManager;
use Src\Model\DBFactory;


$db = DBFactory::getPDOConnection();
$userManager = new UserManager($db);
$personnageManager = new PersonnageManager($db);

$name = $_POST['name'];
$otherPlayers = $personnageManager->getHpAndManaOtherPlayers($name);
$personnage =  $userManager->getPersonnage($name);
$personnage['otherPlayers'] = $otherPlayers;

echo json_encode($personnage);