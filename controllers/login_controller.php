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
$req->execute(array(
    'firstname' => $firstname, 
    
));

$resultat = $req->fetch();
if(!empty($resultat)){

// Comparaison du pass avec la bdd
$isPassCorrect = password_verify($_POST['password'], $resultat['password']);

}
//if(password_verify($pass, $))


    
    //echo "L'identifiant ou le mot de passe est incorrect";
} else {
    if ($isPassCorrect){
        //session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['firstname'] = $resultat['firstname'];
      //  $req->execute();
        echo ("Vous etes co !");
    } else {
        echo "L'identifiant ou le mot de passe est incorrect";
    }
}
}else{
    $message_login = Messages::alert('Veuillez remplir tous les champs', 'red', '#fab0aa');
}


//header("Location:restaurant_view.php");



?>

