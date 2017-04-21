<?php

include_once "../../Autoloader.php";
Autoloader::register();

use Src\Model\UserManager;
use Src\Model\DBFactory;


$db = DBFactory::getPDOConnection();
$userManager = new UserManager($db);

echo json_encode($userManager->getPersonnage($_POST['name']));