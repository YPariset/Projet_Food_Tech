

 <header class="main-header1">
 <!--<img src="./_assets/image/img.jpeg" alt="food" /> -->
 
 <div class="logo-bouton">
   <?php if(!isset($_SESSION['username'])) : ?>
      <div>
         <span><a href="index.php?page=home"><img src="./_assets/image/Logo_blanc.png" width="90" height="auto" alt="logo feeling food"></a></span>
      </div>

      <div>
         <ul class="block-bouton">
            <li class="bouton sign"><a class="btnsign" href="index.php?page=signup">Sign Up</a></li>
            <li class="bouton log"><a class="btnlog" href="index.php?page=login">Log In</a></li>
         </ul>
      </div>
   </div>
   <?php else  : ?>
      <div>
         <span><a href="index.php?page=home"><img src="./_assets/image/Logo_blanc.png" width="90" height="auto" alt="logo feeling food"></a></span>
      </div>

      <div>
         <ul class="block-bouton">
            <li class="bouton sign"><a class="btnsign" href="index.php?page=profile">Profile</a></li>
            <li class="bouton log"><a class="btnlog" href="index.php?page=logout">Log Out</a></li>
            <li><a class="cart" href="index.php?page=shoppingcart"><i class="fas fa-cart-arrow-down fa-2x logoCart"></i></a></li>
         </ul>
      </div>
   </div>


   <?php endif; ?>
   <div class="mainTitle">
         <h1> Trouvez des restaurants autour de vous</h1>
         <p>vive les vacances</p></br>
   </div>
      <div class="location-search" id="location-search">
         <input id="adress-input" class="adress-input" name="adress-input" type="text" placeholder="indiquez votre adresse">
         <button class="submit-button" name="submit-button" type="submit"><span class="arrow"><i class="fas fa-arrow-right"></i></span></button>
      </div>
      <button id="geolocalisation" class="geolocalisation" name="geolocalisation" type="submit"><span><i class="fas fa-location-arrow"></i></span> Trouver ma position</button>
   
   </div>
   <script>window.addEventListener("load",function(e){
            var input= document.getElementById("adress-input");
            var local= document.getElementById("geolocalisation");
            input.addEventListener("click",function(e){
               local.style.display="block"
            });
           
         });
      </script>
      <script>
         var div_top = $('.location-search').offset().top;

            $(window).scroll(function() {
               var window_top = $(window).scrollTop() - 0;
               if (window_top > div_top) {
                  if (!$('.location-search').is('.sticky')) {
                        $('.logo-bouton-sticky').addClass('bg_sticky');
                        $('.location-search').addClass('sticky');
                  }
               } else {
                  $('.location-search').removeClass('sticky');
                  $('.logo-bouton-sticky').removeClass('bg_sticky');
               }
            });
      </script>
 <?php if(!isset($_SESSION['username'])) : ?>
   <div class="logo-bouton-sticky">
      
      <div>
         <span><a href="index.php?page=home"><img src="./_assets/image/Logo_blanc.png" width="90" height="auto" alt="logo feeling food"></a></span>
      </div>

      <div>
         <ul class="block-bouton">
         <li class="bouton sign"><a class="btnsign" href="index.php?page=signup">Sign Up</a></li>
            <li class="bouton log"><a class="btnlog" href="index.php?page=login">Log In</a></li>
         </ul>
      </div>
   </div>
   </header>
<?php else  : ?>
   <div class="logo-bouton-sticky">
      
      <div>
         <span><a href="index.php?page=home"><img src="./_assets/image/Logo_blanc.png" width="90" height="auto" alt="logo feeling food"></a></span>
      </div>

      <div>
         <ul class="block-bouton">
            <li class="bouton sign"><a class="btnsign" href="index.php?page=profile">Profile</a></li>
            <li class="bouton log"><a class="btnlog" href="index.php?page=logout">Log Out</a></li>
            <li><a class="cart" href="index.php?page=shoppingcart"><i class="fas fa-cart-arrow-down fa-2x logoCart"></i></a></li>
         </ul>
      </div>
   </div>
   </header>
   <?php endif; ?>
   