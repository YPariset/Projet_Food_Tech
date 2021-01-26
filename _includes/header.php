

 <header class="main-header1">
 <!--<img src="./_assets/image/img.jpeg" alt="food" /> -->
   <div id="logo-bouton">
      <div>
         <span><a href=""><img src="./_assets/image/Logo_blanc.png" width="150" height="150" alt="logo feeling food"></a></span>
      </div>
      <div>
         <ul class="block-bouton">
            <li class="bouton sign"><a class="btnsign" href="index.php?page=signup">Sign Up</a></li>
            <li class="bouton log"><a class="btnlog" href="index.php?page=login">Log In</a></li>
         </ul>
      </div>
   </div>
   <div>
   <div class="mainTitle">
         <h1> Trouvez des restaurants autour de vous</h1>
         <p>vive les vacances</p></br>
   </div>
      <div class="location-search">

         <input id="adress-input" class="adress-input" name="adress-input" type="text" placeholder="indiquez votre adresse">
         <button class="submit-button" name="submit-button" type="submit"><span class="arrow"><i class="fas fa-arrow-right"></i></span></button>
         <button id="geolocalisation" class="geolocalisation" name="geolocalisation" type="submit"><span><i class="fas fa-location-arrow"></i></span> Trouver ma position</button>
      </div>
   
   </div>
   <script>window.addEventListener("load",function(e){
            var input= document.getElementById("adress-input");
            var local= document.getElementById("geolocalisation");
            input.addEventListener("click",function(e){
               local.style.display="block"
            });
         });
      
      </script>



 </header>
   