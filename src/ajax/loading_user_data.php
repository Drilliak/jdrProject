<?php

include_once "../../Autoloader.php";
Autoloader::register();

use Src\Model\UserManager;
use Src\Model\PersonnageManager;
use Src\Model\DBFactory;
use Src\Model\MessageManager;


$db = DBFactory::getPDOConnection();
$userManager = new UserManager($db);
$personnageManager = new PersonnageManager($db);
$messageManager = new MessageManager($db);

$name = $_POST['name'];
$otherPlayers = $personnageManager->getHpAndManaOtherPlayers($name);
$personnage =  $userManager->getPersonnage($name);
$personnage['otherPlayers'] = $otherPlayers;
$personnage['newMessages'] = $messageManager->getLastMessages((int)$_POST['idLastMessage']);

echo json_encode($personnage);