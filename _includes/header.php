

 <header class="main-header1">
 <!--<img src="./_assets/image/img.jpeg" alt="food" /> -->
 
 <div class="logo-bouton">
   
      <!-- <div>
         <span><a href="index.php?page=home"><img src="./_assets/image/Logo_blanc.png" width="160" height="auto" alt="logo feeling food"></a></span>  
      </div>

      <div>
         <ul class="block-bouton">
            <li class="bouton sign"><a class="btnsign" href="index.php?page=signup">Sign Up</a></li>
            <li class="bouton log"><a class="btnlog" href="index.php?page=login">Log In</a></li>
         </ul>
      </div> -->
   </div>

   <div class="mainTitle">
         <h1><span>Feelin'  </span>the difference</h1> <!--fab-->
         <p>Find a restaurant near you</p></br>
   </div>
      <div class="location-search" id="location-search">
         <input id="adress-input" class="adress-input" name="adress-input" type="text" placeholder="Enter your address">
         <button class="submit-button" name="submit-button" type="submit"><span class="arrow"><i class="fas fa-arrow-right"></i></span></button>
      </div>
      <button id="geolocalisation" class="geolocalisation" name="geolocalisation" type="submit"><span><i class="fas fa-location-arrow"></i></span> Find my location</button>
   
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
<div class="logo-bouton-sticky">
   
   <div>
      <span><a href="index.php?page=home"><img src="./_assets/image/Logo_blanc.png" width="160" height="auto" alt="logo feeling food"></a></span>  
   </div>

   <div>
      <ul class="block-bouton">
         <li class="bouton sign"><a class="btnsign" href="index.php?page=signup">Sign Up</a></li>
         <li class="bouton log"><a class="btnlog" href="index.php?page=login">Log In</a></li>
      </ul>
   </div>
</div>
</header>
 
   