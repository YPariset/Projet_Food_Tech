

 <header class="main-header1">
  
<div class="logo-bouton"></div>


   <div class="mainTitle">
         <h1><span>Feelin'  </span>the difference</h1> <!--fab-->
         <p>Find a restaurant near you</p></br>
   </div>
      <div class="location-search" id="location-search">
         
         <div id="map" style="display: none;"></div>
         <div id="geocoder" class="geocoder"></div>
        
      </div>
      <button id="geolocalisation" class="geolocalisation" name="geolocalisation" type="submit"><span><i class="fas fa-location-arrow"></i></span> Find my location</button>
   
   </div>
<div class="logo-bouton-sticky">
   
   <div>
      <span><a href="index.php?page=home"><img src="./_assets/image/Logo_blanc.png" width="120" height="auto" alt="logo feeling food"></a></span>  
   </div>

   
   <?php if(isset($_SESSION['username'])) : ?>
      <div>
      <ul class="block-bouton">
         <li class="bouton sign"><a class="btnsign" href="index.php?page=profile">Profile</a></li>
         <li class="bouton log"><a class="btnlog" href="index.php?page=logout">Log Out</a></li>
      </ul>
      </div>
      <?php else : ?>
         <div>
         <li class="bouton sign"><a class="btnsign" href="index.php?page=signup">Sign Up</a></li>
         <li class="bouton log"><a class="btnlog" href="index.php?page=login">Log In</a></li>
      </div>
      <?php endif; ?>
   
</div>

<script>
   mapboxgl.accessToken = 'pk.eyJ1IjoieXBhcmlzZXQiLCJhIjoiY2trbXpkbHIzMXdlbjJucGczdTduZzZ0ayJ9.jzw_Lv9CPSAo7OZAaKN6ag';
    var map = new mapboxgl.Map({
        container: 'map',
        
        center: [-79.4512, 43.6568],
        zoom: 13
    });

    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        placeholder:"Enter your position"
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

   </script>


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
      <script>
         document.getElementById("geocoder").addEventListener('keypress', function(event){
                        if (event.keyCode == 13){
                               document.location.href="index.php?page=restaurant"
                        }
                    });
      </script>
</header>
 
   