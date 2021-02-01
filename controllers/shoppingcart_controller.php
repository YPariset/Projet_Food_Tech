<?php
session_start();
$_SESSION['panierMontant'] = array();
$getFood = new Food();


$shopCart = new ShoppingCart();
$totalAmount = $shopCart->montant_panier();
$_SESSION['panierMontant'] = $totalAmount;

$tax = number_format(($_SESSION['panierMontant'] * 5) / 100, 2);

if(isset($_POST['qteValid'])){
    if(!empty($_POST['qte'])){
        $shopCart->changeQuantity($_POST['name'], $_POST['qte']);
    
    }
}
if(isset($_POST['remove'])){
    $nameToDelete = $_POST['nameDelete'];
    $shopCart-> removeFromCart($nameToDelete);
    header('Location:index.php?page=shoppingCart');
}


print_r($_SESSION['panier']);
