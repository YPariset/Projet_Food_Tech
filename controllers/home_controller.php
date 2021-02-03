<?php
session_start();
//si il n'existe pas, on crée panier en session
$cart = new ShoppingCart();
if(!isset($_SESSION['panier'])){
    $cart->createCart();
}


