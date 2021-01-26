<?php

    session_start();
   
    if(isset($_POST["username"]) && isset($_POST["password"])){
        if (!empty($username) && !empty($password)){
    //var_dump($resultat);
            $username=htmlspecialchars($_POST["username"]);
            $password=htmlspecialchars($_POST["password"]);
 
    // Comparaison du pass avec la bdd
    $isPassCorrect = password_verify($_POST['password'], $resultat['password']);
    $resultat = $db->prepare("SELECT * FROM Alimentation as A WHERE username= :username AND A.password = $isPassCorrect");
    $resultat->bindparam("username", $username);
    $resultat->bindparam("password", $password);  

    //if(password_verify($pass, $))

    if (!$resultat){
        echo "L'identifiant ou le mot de passe est incorrect";
    } else {
        if ($isPassCorrect){
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['username'] = $resultat['username'];
            $req->execute();
            header("Location:restaurant_view.php");
        } else {
            echo "L'identifiant ou le mot de passe est incorrect";
        }
    }
}
}

?>