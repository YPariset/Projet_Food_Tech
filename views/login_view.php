<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
<?php include_once '_includes/header-banner.php'; ?>  
     <div class="connexion">
     <?php if(isset($message_login)){echo $message_login;} ?>

     <h1 class="mb-1" style="margin-top:60px">Log in</h1>
     <h2 class="mb-2">Join us and enjoy a new experience!</h2>  
          <div id="signup">
               <form action="" method="post" class="signup_identifiant" >
               <label for="name">Username</label><br>
               <input type="username" id="name" name="username">
               <br><br>
               <label for="pass">Password</label><br>
               <input  type="password" id="pass" name="password">
               <br>
               <button class="signup_motdepasse" name="valider">Connect</button>
          </form>
          </div>
     </div>
<?php include_once '_includes/footer.php'; ?> 
</body>
</html>