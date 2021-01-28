<?php
session_start();

$user = new Customer();

//on recupere toutes les datas de clients
$dataClient = $user->getDatasClientById($_SESSION['id']);
$sessionUser = $_SESSION['id'];

//on recupere les points du client
$getPoints = $user->getDatasPoints($_SESSION['id']);

//recuperation données du form update et insertion en BDD
if(isset($_POST['updateUser'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['username']) 
        && !empty($_POST['street']) && !empty($_POST['zip'])  && !empty($_POST['city']) ){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = $_POST['email'];
        $username = $_POST['username'];
        $street = $_POST['street'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];

        $user->updateClientDatas($prenom, $nom, $mail, $username,$street, $zip, $city, $sessionUser);
        $alertEdit = Messages::alert('Informations modifiées avec succès', 'green', '#97f7a2');
        $_SESSION['firstname'] =  $prenom;
        $_SESSION['lastname'] = $nom ;
        $_SESSION['email'] = $mail;
        $_SESSION['username'] = $username;

    }else{
        $alertEdit = Messages::alert('Veuillez remplir tous les champs', 'orange', '#fae1a7');
    }
}

//on affiche les commandes 
if(isset($_GET['action']) && $_GET['action'] == 'history'){
    $order = new Order();
    //$dishOrder = $order->getDishesOrder($_SESSION['id']);
    $orderOrder = $order->getOrder($_SESSION['id']);
}

//on affiche le contenu d'une commande
if(isset($_GET['action']) && $_GET['action'] == 'history' && isset($_GET['id'])){
    $getOrderContent = $order->getDishesOrder($_SESSION['id'], $_GET['id']);
}


//on recupere les elements de la wishlist
if(isset($_GET['action']) && $_GET['action'] == 'wishlist'){
    $wishlist = $user->getWishList($_SESSION['id']);
}

       
