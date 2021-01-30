<?php
session_start();

$resto = new Food();
$datadejuste1rest= $resto->getRestaurantById($_GET['page']);

if(isset($_GET['resto']))
{
    $resto = new Food();
    $datasResto = $resto->getSaltyByrestaurantId($_GET['resto']);
    $dataresto2 = $resto->getSweetByrestaurantId($_GET['resto']);
    $datadejuste1rest= $resto->getRestaurantById($_GET['resto']);

    if(isset($_POST['cartButton'])){
        if(!empty($_POST['qteCart'])){
            $qte = $_POST['qteCart'];
            $nomItem = $_POST['nomItem'];
            $prixItem = $_POST['unitPrice'];

            $cart =new ShoppingCart();
            $cart->addToCart($nomItem, $qte, $prixItem);
            var_dump($_SESSION['panier']);
        }else{
            echo 'il n\'y a pas de donnée';
        }
    }
    
}


