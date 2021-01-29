<?php
session_start();

global $db;
$juste1rest = $db->prepare('SELECT * FROM restaurants WHERE id = 2');
$juste1rest->execute();
$datadejuste1rest = $juste1rest->fetchAll(PDO::FETCH_ASSOC);
var_dump($datadejuste1rest);



if(isset($_GET['resto']))
{
    $resto = new Food();
    $datasResto = $resto->getRestaurantById($_GET['resto']);
}
