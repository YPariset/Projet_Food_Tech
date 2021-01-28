<?php
include_once 'config.php';

try{
    $db = new PDO('mysql:host=localhost;dbname=Alimentation;charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
    echo 'Erreur ' . $exception->getMessage();
}
?>