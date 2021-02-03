<?php
session_start();

//creation compte
if(isset($_POST['signup']) && $_POST['signup'] == 'done'){
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['email']) && 
        !empty($_POST['passSign']) && !empty($_POST['streetSign']) && !empty($_POST['zipSign']) &&
         !empty($_POST['citySign']) && !empty($_POST['birthday'])){
        
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['passSign'], PASSWORD_DEFAULT);
            $street = $_POST['streetSign'];
            $zip = $_POST['zipSign'];
            $city = $_POST['citySign'];
            $birthday = $_POST['birthday'];
            $dateCreation = date("Y/m/d");
            $foodie = 10;

        $client = new Customer();
        $clientExist = $client->VerifyMailAvailable($email);
        $usernameExist = $client->VerifyUsernameAvailable($username);

        if($clientExist == 1){
               $alertSign = Messages::alert('Adresse mail déja utilisée', 'red', '#fab0aa');
        } elseif ($usernameExist == 1) {
               $alertSign = Messages::alert("Username déjà utilisé", 'red', '#fab0aa');
        }else{
               $avatarDefault = "_assets/image/avatar/default.jpg";
               $client->createClient($firstname, $lastname, $username, $email, $password, $street, $zip, $city, $birthday, $dateCreation, $avatarDefault, $foodie);
               $alertSign = Messages::alert('Votre compte à été crée avec succès, veuillez vous connecter!', 'green', '#97f7a2');
               
        }


    }else{
        $alertSign = Messages::alert('Veuillez remplir tous les champs', 'red', '#fab0aa');
    }
}

?>