<div class="header-small sticky" style="position:relative; text-align:center;position:fixed;width:100%;top:0;background:rgba(255,255,255,0.948432);z-index:10;">
   
   <div>
      <span><a href="index.php?page=home"><img src="./_assets/image/Logo_gris.png" width="90" height="auto" alt="logo feeling food"></a></span>
   </div>

   <div class="search">
       <button type="submit" name="headerSearchSubmit" value="searched"><i class="fas fa-search"></i></button>
       <input type="text" placeholder="search for anything..." name ="headerSearch"/>
   </div>

 
       <ul class="mainNav">
           <li><a href="index.php?page=restaurant">Food</a></li>
           <li><a href="index.php?page=restaurant">Drinks</a></li>
           <li><a href="index.php?page=restaurant">Categories</a></li>
           <li><a href="index.php?page=restaurant">Restaurants</a></li>
           <li><a href="index.php?page=restaurant">Specials</a></li>
        </ul>

   <div>
   <?php if(!isset($_SESSION['username'])) : ?>
      <ul class="block-bouton">
         <li class="but"><a class="btnHeader btnhA" href="index.php?page=signup">Sign Up</a></li>
         <li class="but"><a class="btnHeader btnhB" href="index.php?page=login">Log In</a></li>
      </ul>
      <?php else : ?>
         <ul class="block-bouton">
            <li class="but"><a class="btnHeader btnhA" href="index.php?page=profile">Profile</a></li>
            <li class="but"><a class="btnHeader btnhB" href="index.php?page=logout">Log Out</a></li>
            <li><a class="btn btn-secondary" href="index.php?page=shoppingcart" style="background-color:#3cb6c9;border-radius:40px;height:27px;line-height:12px">
                     <i class="fas fa-cart-arrow-down logoCart"></i>
                     <span class="headerCartItem"><?php if($count = count($_SESSION['panier']['nom'] )){echo $count;}; ?></span> items
               </a>
            </li>
      </ul>
      <?php endif; ?>
   </div>

</div>

<!-- affichage apercu panier -->
<div class="dropdownCart">
   <!-- si utilisateur connecté -->
      <?php if(isset($_SESSION['id'])) : ?>
         <!-- si panier vide -->
         <?php if(empty($_SESSION['panier']['nom'])) : ?>
            <h5>Wanna eat something?</h5>
            <a href="index.php?page=restaurant" class="btn-btn-secondary">order now</a>

         <!-- si le panier est rempli -->
          <?php else :?>
               <h5>order</h5>
               <?php for($i = 0; $i < count($_SESSION['panier']['nom']); $i++) : ?>
                  <div style="display:flex;flex-flow:row wrap; justify-content:space-between;">
                     <p><strong><?php echo $_SESSION['panier']['nom'][$i] ?><span> X </span> <?php echo $_SESSION['panier']['quantite'][$i]; ?></strong></p>
                     <p style="color:#3cb6c9;"> $<?php echo $_SESSION['panier']['prix'][$i] ?></p>
                  </div>
                  <?php endfor; ?>
                  <br><hr>
                  <?php
                  $shopCart = new ShoppingCart();
                  $TotalAmount = $shopCart->montant_panier();
                  ?>
               <div class="subtotal" style="font-size:20px;display:flex;flex-flow:row wrap; justify-content:space-between;">
                  <p>Subtotal </p>
                  <p style="color:#3cb6c9;">$<?php echo $TotalAmount; ?></p>
               </div>
               <div style="margin:0 auto;">
               <a class="btn btn-secondary" href="index.php?page=shoppingcart" style="border-radius:40px;color:white;background-color:#3cb7c8;padding:8px 120px;">Checkout</a>
               </div>
         <?php endif ?>
   <!-- si utilisateur non connecté -->
   <?php else : ?>
      <br><br><br>
      <div style="margin:0 auto;text-align:center;">
         <h5>Please login view orders</h5><br><br>
         <a class="btn btn-secondary" href="index.php?page=login" style="border-radius:40px;color:white;background-color:#3cb7c8;padding:8px 120px;">log in </a>
       </div>
   <?php endif; ?>
   </div>
<!-- fin affichage apercu panier -->
