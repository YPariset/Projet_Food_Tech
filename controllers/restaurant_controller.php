<?php
session_start();

$resto = new Food();
$datadejuste1rest= $resto->getRestaurantById($_GET['resto']);



if(isset($_GET['resto']))
{
    $resto = new Food();
    $datasResto = $resto->getSaltyByrestaurantId($_GET['resto']);
    $dataresto2 = $resto->getSweetByrestaurantId($_GET['resto']);
    
}
