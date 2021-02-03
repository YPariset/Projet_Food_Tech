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

//on recupere les discount
if(isset($_GET['action']) && $_GET['action'] == 'promo'){
    $discounts = $user->getDiscountt($_SESSION['id']);
}

//upload photo

   //debut upload images
   $poids_max = 512000; // Poids max de l'image en octets
   $repertoire = '_assets/image/avatar/'; // Repertoire d'upload
   
   if (isset($_FILES['fichier'])){
      // On vérifit le type du fichier
      if ($_FILES['fichier']['type'] != 'image/png' && $_FILES['fichier']['type'] != 'image/jpeg' && $_FILES['fichier']['type'] != 'image/jpg' && $_FILES['fichier']['type'] != 'image/gif') {
         $erreur = 'Le fichier doit être au format *.jpeg, *.gif ou *.png .';
      }
      
      // On vérifit le poids de l'image
      elseif ($_FILES['fichier']['size'] > $poids_max){
         $erreur = 'L\'image doit être inférieur à ' . $poids_max/1024 . 'Ko.';
      }
      
      // On vérifit si le répertoire d'upload existe
      elseif (!file_exists($repertoire)){
         $erreur = 'le dossier d\'upload n\'existe pas.';     
      }
      
      // Si il y a une erreur on l'affiche sinon on peut uploader
      if(isset($erreur)){
         echo '' . $erreur;
      }else
      {          
         // On définit l'extention du fichier puis on le nomme par le timestamp actuel
         if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpeg'; }
         if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpg'; }
         if ($_FILES['fichier']['type'] == 'image/png') { $extention = '.png'; }
         if ($_FILES['fichier']['type'] == 'image/gif') { $extention = '.gif'; }
         $nom_fichier = time().$extention;
                
         // On upload le fichier sur le serveur.
         if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire.$nom_fichier)) {
              
               echo 'Votre avatar a été modifié avec succès!';
               $img = $repertoire.$nom_fichier;
               global $db;
               $up = $db->prepare('UPDATE customer SET avatar = :img  WHERE firstname = :session');
               $up->execute(array(':img' => $img, ':session' => $_SESSION['firstname']));
               header('location:index.php?page=profile');
         }
         else{
            echo 'L\'image n\'a pas pu être uploadée sur le serveur.';
         }
        
      }
      
   }




// CHARTS
 

?>
       
