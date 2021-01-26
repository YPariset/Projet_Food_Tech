<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
     
     <div class="connexion">
          <div id="signup">
               <form action="" method="post" class="signup_identifiant" >
               <?php if(isset($message_login)){
                    echo $message_login;
               } ?>
               <label id="name" for="name">Name</label>
               <input type="name" id="name" name="firstname">
               <br>
               <label id="pass" for="pass">Mot de passe</label>
                    <input type="pass" id="pass" name="password">
               <br>
               <button class="signup_motdepasse" name="valider">Se connecter</button>
          </form>
          </div>
     </div>
<?php include_once '_includes/footer.php'; ?> 
</body>
</html>