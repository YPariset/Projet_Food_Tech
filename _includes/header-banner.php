<div class="header-small sticky" style="position:relative; text-align:center;position:fixed;width:100%;top:0;background:rgba(255,255,255,0.948432);z-index:10;">
   
   <div>
      <span><a href="index.php?page=home"><img src="./_assets/image/Logo_gris.png" width="90" height="auto" alt="logo feeling food"></a></span>
   </div>

   <div style="margin-left: 222px" class="search">
      <form action="index.php?page=restaurant#resultatSearch" method="POST">
         <button type="submit" name="headerSearchSubmit" value="searched"><i class="fas fa-search"></i></button>
         <input style="width:409px;background-color:transparent;" type="text" placeholder="search for anything..." name ="headerSearch"/>
      </form>
   </div>

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
            <li id="buttonPreviewCart"><a class="btn btn-secondary buttonItem" href="index.php?page=shoppingcart" 
               style="background-color:#3cb6c9;border-radius:40px;height:27px;line-height:12px;border:none;">
                     <i class="fas fa-cart-arrow-down logoCart"></i>
                     <span><?php 
                           if(isset($_SESSION['panier'])){
                              $count = count($_SESSION['panier']['nom']);
                              if($count > 1){
                                  echo $count .' '.functions::pluriel("item");
                              }else{
                                 echo $count . ' item';
                              } 
                           }
                     ?></span> 
               </a>
            </li>
      </ul>
      <?php endif; ?>
   </div>

</div>

<!-- affichage apercu panier -->
<div id="dropdownCart" class="dropdownCart">
   <!-- si utilisateur connecté -->
      <?php if(isset($_SESSION['id']))  : ?>
         <!-- si panier vide -->
         <?php if(!isset($_SESSION['panier'])) : ?>
            <h5>Your shopping cart is empty</h5>

         <!-- si le panier est rempli -->
          <?php else  :?>
               <?php if(!count($_SESSION['panier']['nom'])) :?>
                  <h5>Your shopping cart is empty</h5>
               <?php else :?>
               <h5>order</h5>
               <?php for($i = 0; $i < count($_SESSION['panier']['nom']); $i++) : ?>
                  <div style="display:flex;flex-flow:row wrap; justify-content:space-between;">
                     <p><strong><?php echo $_SESSION['panier']['nom'][$i] ?><span> X </span> <?= $_SESSION['panier']['quantite'][$i]; ?></strong></p>
                     <p style="color:#3cb6c9;"> $<?= $_SESSION['panier']['prix'][$i]; ?></p>
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
               <a class="btn btn-secondary" href="index.php?page=shoppingcart"  style="border-radius:40px;color:white;background-color:#3cb7c8;padding:8px 120px; margin-top:20px">Checkout</a>
              
               </div>
               <?php endif ?>
         <?php endif ?>
   <!-- si utilisateur non connecté -->
   <?php else : ?>
      <br><br><br>
      <div style="margin:0 auto;text-align:center;">
         <h5>Please login to view orders</h5><br><br>
         <a  class="btn btn-secondary" href="index.php?page=login" style="border-radius:40px;color:white;background-color:#3cb7c8;padding:8px 120px;">log in </a>
       </div>
   <?php endif; ?>
   </div>
<!-- fin affichage apercu panier -->

<script>
   window.addEventListener("load", function(e){
      var buttonPreviewCart = document.querySelector(".buttonItem");
      buttonPreviewCart.addEventListener("mouseover", function(e){
         document.querySelector(".dropdownCart").style.display= "block";
      });
      window.addEventListener("click", function(e){
         document.querySelector(".dropdownCart").style.display= "none";
      });
   });

</script>

<?php
   //si clear on supprime le panier
   if(isset($_POST['empty'])){
      $delete = new ShoppingCart();
      $clear = $delete->clearCart();
   }
   //puis création d'un panier vide
   $cart = new ShoppingCart();
      if(!isset($_SESSION['panier'])){
      $cart->createCart();
   }
   ?>