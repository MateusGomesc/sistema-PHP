<?php
include "../includes/autoLoad.php";
Security::verifyAuthentication();

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once "../../controllers/JogoController.php";

    $JogoController = new JogoController();

    $res = $JogoController->remove($_GET['id']);

    if($res){
        header("location: ./");
        exit();
    }
}