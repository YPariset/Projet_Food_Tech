<?php
session_start();
if(isset($_GET['pay'])){
    $orderNumber = 'REF'. mb_strtoupper(substr($_SESSION['lastname'], 0, 3)) . rand(1000, 10000);
    $_SESSION['number'] = $orderNumber;

    //on cree une nouvelle commande client
    $createOrder = new Order();
    $createOrder->createOrder($_SESSION['id'], $_SESSION['panierMontant'], date("Y/m/d"), $orderNumber);
    //on ajoute 10 ppoints sur le compte client
    $_SESSION['foodie'] += 10;
    $createOrder->creditPoints($_SESSION['foodie'], $_SESSION['id']);
    // var_dump(count($_SESSION['panier']['nom']));

    for($i = 0; $i < count($_SESSION['panier']['nom']); $i++){

        //on va chercher id plat et id order
        $idDish = $createOrder->selectIdDishByName($_SESSION['panier']['nom'][$i]);
        $idOrder = $createOrder->selectIdOrderByRef($orderNumber);
        //on crée des items de la commande pour les afficher dans l'historique
        $createItem = $createOrder->createOrderItem($idOrder['id'], $_SESSION['panier']['quantite'][$i], $_SESSION['panier']['prix'][$i], $idDish['id']);
    }

    unset($_SESSION['panier']);
}