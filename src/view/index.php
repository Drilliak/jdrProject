<?php
session_start();

if (!isset($_SESSION['login'])){
    header('Location: connection.php');

}

if (strtolower($_SESSION['role']) == "gamemaster"){
    include("indexGameMaster.php");
}
if (strtolower($_SESSION['role']) == "player"){
   include("indexUser.php");
}