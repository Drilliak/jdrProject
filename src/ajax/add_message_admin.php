<?php

include_once "../../Autoloader.php";
Autoloader::register();

use Src\Model\DBFactory;
use Src\Model\MessageManager;

$db = DBFactory::getPDOConnection();
$messageManager = new MessageManager($db);

$messageManager->addMessage('salut les copains');