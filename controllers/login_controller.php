<?php



ini_set('display_errors','on');
error_reporting(E_ALL);
session_start();



global $db;


if (isset($_POST['valider'])){
    if(isset($_POST['firstname']) && isset($_POST['password'])){

        $firstname = htmlspecialchars($_POST["firstname"]);
        $password = htmlspecialchars($_POST["password"]);

        $req = $db->prepare('SELECT * FROM customer WHERE firstname = :firstname');
        $req->execute(array('firstname' => $firstname));
        $resultat = $req->fetch();

        if(!empty($resultat)){
             $isPassCorrect = password_verify($_POST['password'], $resultat['password']);

                if ($isPassCorrect){
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['firstname'] = $resultat['firstname'];
                    header('Location:index.php?page=restaurant');
                }else{
                    $message_login = Messages::alert('Mot de passe non reconnu, veuillez recommencer', 'red', '#fab0aa');
                }
         }else{
            $message_login = Messages::alert('Mot de passe ou identifiant invalide, veuillez recommencer', 'red', '#fab0aa');
         }    
    }else{
        $message_login = Messages::alert('Veuillez remplir tous les champs', 'red', '#fab0aa');
    }
}
?>

