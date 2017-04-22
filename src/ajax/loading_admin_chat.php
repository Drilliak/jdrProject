<?php

include_once "../../Autoloader.php";
Autoloader::register();

use Src\Model\DBFactory;
use Src\Model\MessageManager;


$db = DBFactory::getPDOConnection();
$messageManager = new MessageManager($db);

echo json_encode($messageManager->getLastMessages(0));