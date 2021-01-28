<?php
session_start();

$user = new Customer();
$dataClient = $user->getDatasClientById($_SESSION['id']);
$sessionUser = $_SESSION['id'];

$getPoints = $user->getDatasPoints($_SESSION['id']);
var_dump($getPoints['points']);


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

        // $client->updateClientsDatas($firstname, $lastname, $username, $email, $street, $zip, $city, $session);
