<?php
include_once 'config.php';

try{
    $db = new PDO('mysql:host=localhost;dbname=Alimentation;charset=utf8', 'root', 'root');
}catch(PDOException $exception){
    echo 'Erreur ' . $exception->getMessage();
}
?>