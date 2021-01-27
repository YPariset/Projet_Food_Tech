<?php
session_start();

$client = new client(); 
$getDataClient = $client->getDatasClientByName($_SESSION['username']);
var_dump($getDataClient);

if(isset($_POST['submit'])) {
    if(!empty($_POST['firstname']) && !empty($_POST['lastname'])
     && !empty($_POST['username']) && !empty($_POST['email'])
      && !empty($_POST['password']) && !empty($_POST['streetSign'])
      && !empty($_POST['zipSign']) && !empty($_POST['citySign'])
      && !empty($_POST['birthday'])) {

       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $username = $_POST['username'];
       $email= $_POST['email'];
       $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
       $street = $_POST['streetSign'];
       $zip = $_POST['zipSign'];
       $city = $_POST['citySign'];
       $birthday = $_POST['birthday'];
       $session = $_SESSION['username'];

        $client->updateClientsDatas($firstname, $lastname, $username, $email, $password, $street, $zip, $city, $birthday, $session);
        $alertEdit = Messages::alert('Votre compte à été crée avec succès, veuillez vous connecter!', 'green', '#97f7a2');
      }else{
        $alertEdit = Messages::alert('Veuillez remplir tous les champs!', 'red', '#fab0aa');
      }
    }
