<?php
session_start();

//creation compte
if(isset($_POST['signup']) && $_POST['signup'] == 'done'){
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && 
        !empty($_POST['passSign']) && !empty($_POST['streetSign']) && !empty($_POST['zipSign']) &&
         !empty($_POST['citySign']) && !empty($_POST['birthday'])){
        
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['passSign'];
            $street = $_POST['streetSign'];
            $zip = $_POST['zipSign'];
            $city = $_POST['citySign'];
            $birthday = $_POST['birthday'];
            $dateCreation = date("Y/m/d");

        $client = new Client();
        $clientExist = $client->VerifyMailAvailable($email);
        
        if($clientExist == 1){
            $alertSign = Messages::alert('Adresse mail déja utilisée', 'red', '#fab0aa');
        }else{
            $client->createClient($firstname, $lastname, $email, $password, $street, $zip, $city, $birthday, $dateCreation);
            $alertSign = Messages::alert('Votre compte à été crée avec succès, veuillez vous connecter!', 'green', '#97f7a2');
        }


    }else{
        $alertSign = Messages::alert('Veuillez remplir tous les champs', 'red', '#fab0aa');
    }
}

?>