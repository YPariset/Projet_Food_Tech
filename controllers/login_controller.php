<?php
session_start();

global $db;


if (isset($_POST['valider'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){

        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $req = $db->prepare('SELECT * FROM customer WHERE username = :username');
        $req->execute(array('username' => $username));
        $resultat = $req->fetch();

        if(!empty($resultat)){
             $isPassCorrect = password_verify($_POST['password'], $resultat['password']);

                if ($isPassCorrect){
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['username'] = $resultat['username'];
                    header('Location:index.php?page=restaurant');
                }else{
                    $message_login = Messages::alert('Invalid password or username, please try again', 'red', '#fab0aa');
                }
         }else{
            $message_login = Messages::alert('Invalid password or username, please try again', 'red', '#fab0aa');
         }    
    }else{
        $message_login = Messages::alert('Please complete all fields', 'red', '#fab0aa');
    }
}
?>

