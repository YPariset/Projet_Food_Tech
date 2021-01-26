<?php



ini_set('display_errors','on');
error_reporting(E_ALL);
session_start();



global $db;


$firstname = htmlspecialchars($_POST["firstname"]);
$password = htmlspecialchars($_POST["password"]);
var_dump($password);

$req = $db->prepare('SELECT * FROM customer WHERE firstname = :firstname');
$req->execute(array(
    'firstname' => $firstname, 
    
));
//var_dump($req);
$resultat = $req->fetch();
//$resultat = $req->rowCount();
var_dump($resultat);


//var_dump($resultat);

// Comparaison du pass avec la bdd
$isPassCorrect = password_verify($_POST['password'], $resultat['password']);
var_dump($isPassCorrect);

//if(password_verify($pass, $))

if (!$resultat){
    var_dump($resultat);
    echo "L'identifiant ou le mot de passe est incorrect";
} else {
    if ($isPassCorrect){
        //session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['firstname'] = $resultat['firstname'];
        $req->execute();
        echo ("Vous etes co !");
    } else {
        echo "L'identifiant ou le mot de passe est incorrect";
    }
}


//header("Location:restaurant_view.php");



?>

