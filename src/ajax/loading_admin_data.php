<?php

include_once "../../Autoloader.php";
Autoloader::register();

use Src\Model\UserManager;
use Src\Model\DBFactory;
use Src\Model\PersonnageManager;

$db = DBFactory::getPDOConnection();
$userManager = new UserManager($db);
$personnageManager = new PersonnageManager($db);

$players = $userManager->getPlayers();

foreach($players as &$player){
   $player['personnage'] = $personnageManager->get($player['id_personnage']);
}
echo json_encode($players);