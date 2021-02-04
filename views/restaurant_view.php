<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
<?php include_once './_includes/header-banner.php'; ?> 

<div class="image">
          <div class="ptext">
               <span class="border">
               <?php if(!isset($_GET['resto'])) :?>
               our restaurants
               <?php else: ?>
               <?php foreach($datadejuste1rest as $data) : ?> 
               <?= $data['name']; ?>
               <?php endforeach; ?>
               <?php endif;?>
               </span>
          </div>
          </div>
          <div id="resultatSearch"></div>
<main style="margin-top:50px;margin-bottom:100px;">
     <!-- result search Bar -->

     <?php if(isset($_POST['headerSearchSubmit'])) : ?>
          <?php if(!empty($_POST['headerSearch'])) : ?>
               <h4 class="countResultatSearch" style="text-align:center; padding-top: 50px; margin-bottom: 70px; font-size: 2.2em;"><?= $messageSearchFood; ?></h4>
               <div style="display: flex; flex-flow: row wrap; justify-content: center;" >
               <?php foreach ($searchBanniere as $dataSearch) : ?>

                    <div style="padding-bottom: 100px; position:relative;">
                         <a href="index.php?page=restaurant&resto=<?= $dataSearch['id'] ?>">
                         <img class="image" src="<?= $dataSearch['img'] ?>" alt="Alt text"/>
                         <div class="text">
                         <h4 style="position:absolute; top:4px; padding-left:6px; color:black; font-size:1em;"><?=$dataSearch['name'] ?></h4>
                         </a>
                    </div>
               </div>
               
               <?php endforeach; ?>
               </div>
               <h3 style="text-align:center; margin-bottom: 40px; padding-top:40px; font-size: 1.7em;"> All the restaurants available</h3>
          <?php endif; ?>
     <?php endif; ?>
     
     
     
     </div>
     <!-- fin de result search -->

     

     <?php if(!isset($_GET['resto'])) :?>
          <template id="temp">
          <?php foreach($datadejuste1rest as $data) : ?>
               <div class="overlay-image">
                    <a href="index.php?page=restaurant&resto=<?= $data['id']; ?>">
                         <h4><?= $data['name']; ?></h4>
                         <h5><?= $data['address']; ?></h5>
                    </a>
               </div> 
          <?php endforeach; ?>
               
          <div class="tradi"><h2>Traditionnal restaurant</h2></div>
                    <div class="restoTradi mostly-customized-scrollbar">
                         <?php foreach($restaurantsTradi as $speciality) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $speciality['id']; ?>">
                                   <img class="image item" src="<?= $speciality['img'] ?>" alt="Alt text"/>
                                   <div class="text item">
                                        <h4><?= $speciality['name']; ?></h4>
                                   </div>        
                              </a>
                         <?php endforeach; ?>     
                    </div> 
               <!-- Organic Restaurants -->
               <div class="organic"><h2>Organic restaurant</h2></div>
                    <div class="restoOrganic mostly-customized-scrollbar">
                         <?php foreach($restaurantsOrganic as $organic) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $organic['id']; ?>">
                                   <img class="image item" src="<?= $organic['img'] ?>" alt="Alt text"/>
                                   <div class="text item">
                                        <h4><?= $organic['name']; ?></h4>
                                   </div>        
                              </a>
                         <?php endforeach; ?>     
                    </div>
               <!-- Gastronomic restaurants -->
               <div class="gastronomique"><h2>Gastronomic Restaurant</h2></div>
                    <div class="restoGastronomique mostly-customized-scrollbar">
                         <?php foreach($restaurantsGastro as $gastro) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $gastro['id']; ?>">
                                   <img class="image item" src="<?= $gastro['img'] ?>" alt="Alt text"/>
                                   <div class="text item">
                                        <h4><?= $gastro['name']; ?></h4>
                                   </div>     
                              </a>
                         <?php endforeach; ?>     
                    </div>
               <!-- Restaurants Vegan -->
               <div class="vegan"><h2>Vegan Restaurant</h2></div>
                    <div class="restoVegan mostly-customized-scrollbar">
                         <?php foreach($restaurantsVegan as $vegan) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $vegan['id']; ?>">
                                   <img class="image" src="<?= $vegan['img'] ?>" alt="Alt text"/>   
                                   <div class="text">
                                        <h4><?= $vegan['name']; ?></h4>
                                   </div>  
                              </a>
                         <?php endforeach; ?>    
                    </div> 

               <!-- Fast Food -->
               <div class="fastFood"><h2>Fast Food</h2></div>
                    <div class="fastFoodResto mostly-customized-scrollbar">
                         <?php foreach($restaurantsFastFood as $fastFood) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $fastFood['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $fastFood['name']; ?></h4>
                                   </div>   
                              </a>
                         <?php endforeach; ?>     
                    </div>

               <!-- Pizza food -->
               <div class="pizza"><h2>Pizza</h2></div>
                    <div class="restoPizza mostly-customized-scrollbar">
                         <?php foreach($Pizzarestaurants as $pizza) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $pizza['id']; ?>">
                              <img class="image" src="<?= $pizza['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $pizza['name']; ?></h4>
                                   </div>   
                              </a>
                         <?php endforeach; ?>  
                    </div> 


               <!-- Salades -->
               <div class="salades"><h2>Salades</h2></div>
                    <div class="restoSalade mostly-customized-scrollbar">
                         <?php foreach($saladesRestaurants as $salades) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $salades['id']; ?>">
                              <img class="image" src="<?= $salades['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $salades['name']; ?></h4>
                                   </div>                     
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Speciality -->
               <div class="specialites"><h2>Speciality</h2></div>
                    <div class="restoSpeciality mostly-customized-scrollbar">
                         <?php foreach($specialityRestaurants as $speciality) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $speciality['id']; ?>">
                              <img class="image" src="<?= $speciality['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $speciality['name']; ?></h4>
                                   </div>         
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Tacos Restaurants -->
               <div class="tacos"><h2>Tacos</h2></div>
                    <div class="restoTacos mostly-customized-scrollbar">
                         <?php foreach($tacosRestaurants as $tacos) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $tacos['id']; ?>">
                              <img class="image" src="<?= $tacos['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $tacos['name']; ?></h4>
                                   </div>             
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Meat Restaurants -->
               <div class="meat"><h2>Meat</h2></div>
                    <div class="restoMeat mostly-customized-scrollbar">
                         <?php foreach($meatRestaurants as $meat) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $meat['id']; ?>">
                                   <img class="image" src="<?= $meat['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $meat['name']; ?></h4>
                                   </div>         
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Pastas restaurants -->
               <div class="pastas"><h2>Pastas</h2></div>
                    <div class="restoPasta mostly-customized-scrollbar">
                         <?php foreach($pastasRestaurants as $pastas) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $pastas['id']; ?>">
                              <img class="image" src="<?= $pastas['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $pastas['name']; ?></h4>
                                   </div>              
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Desserts Restaurants -->
               <div class="desserts"><h2>Desserts</h2></div>
                    <div class="restoDesserts mostly-customized-scrollbar">
                         <?php foreach($dessertsRestaurants as $desserts) : ?>
                              <a class="restaurantDeco" href="index.php?page=restaurant&resto=<?= $desserts['id']; ?>">
                              <img class="image" src="<?= $desserts['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $desserts['name']; ?></h4>
                                   </div>           
                                   </a>
                         <?php endforeach; ?>
                    </div>
          </template>

                    <button class="rm">Read More</button>
     <?php else : ?>
              
      <!-- debut affichage du restaurant selectionné -->
          <div class="containerResto" style="width:90%;margin:60px auto;min-height:400px;">
          <?php foreach($datadejuste1rest as $data) : ?>
                    <h3><?= $data['name']; ?></h3>
                    <P style="color:#3cb6c9">FREE DELIVERY</p>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;"><i class="fas fa-clock"></i> 35-45mn</a>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;"><i class="fas fa-map-marker-alt"></i> <?= $data['address']; ?></h3></a>
          <!-- carte + infos resto -->
          <br><br><br>
                    <div class="presentationInfos" style="justify-content: space-between;">
                         <div>
                         <?= $data['maps']; ?><br>
                         </div>
                         <div class="infosRestaurantOuv">
                              <div>
                                   <h3 class="titreHoraire">Opening hours</h3><br>
                                   <h4 class="infosOuverture1" ><strong>Closed</strong> : <?= $data['fermeture']; ?></h4>
                                   <h4 class="infosOuverture1" ><strong>Tuesday</strong> : <?= $data['horaires']; ?></h4>
                                   <h4 class="infosOuverture1" ><strong>Wednesday</strong> : <?= $data['horaires']; ?></h4>
                                   <h4 class="infosOuverture1" ><strong>Thursday</strong> : <?= $data['horaires']; ?></h4>
                                   <h4 class="infosOuverture1" ><strong>Friday</strong> : <?= $data['horaires']; ?></h4>
                                   <h4 class="infosOuverture1" ><strong>Saturday</strong> : <?= $data['horaires']; ?></h4>
                                   <h4 class="infosOuverture1" ><strong>Sunday</strong> : <?= $data['horaires']; ?></h4>
                              </div>
                         </div>
                    </div>
          <!-- fin cart -->
          <?php endforeach; ?>
          <br><br><br>

     <!-- section dish -->
          <div id="validation"></div>
          <div style="height:80px;"></div>
          <H4>OUR SALTY SELECTION</H4>
          <hr>
          <div style="display:flex;flex-flow:row wrap;justify-content:space-between;margin:60px 0;">
  
          <?php foreach($datasResto as $datas) : ?>
               
               <div class="cardResto" style="min-height:120px;">
                    <div  style="display:flex; flex-flow:row wrap;">
                         <div style="width:70%;padding:20px 20px 0 20px;position:relative;">
                              <h5><strong><?= $datas['name']; ?></strong> <span style="font-size:10px;font-style:italic;">(<?= $datas['cal']; ?>KCAL)</span></h5>
                              <!-- description du produit -->
                              <p style="font-size:12px;"><?= $datas['description']; ?></p>
                              <!-- affichage du prix unitaire -->
                              <span style="font-size:12px;font-weight:bold;color:#3cb6c9">$<?= $datas['price']; ?>
                             
                                   <form method="POST" action="#validation" style="display:inline;margin-left:40px;">
                                   <!-- ajouter ou supprimer quantité -->
                                         <input type="number" name="qteCart" class="qt" value="1" min="1" 
                                         style="border:none;width:30px;backround-color:grey;outline:none;border:0.5px solid #3cb6c9;"/>
                                    <!-- recuperer nom du produit -->
                                        <input type="hidden" name="nomItem" value="<?= $datas['name']; ?>">
                                   <!-- recuperer nom du produit -->
                                         <input type="hidden" name="unitPrice" value="<?= $datas['price']; ?>">
                                   <!-- valider -->
                                        <button type="submit" name="cartButton" style="border:none;background-color:#3cb6c9;border-radius:40px;color:white;padding:2px 5px;">
                                             <span class="addCart">Add to cart</span>
                                        </button>
                                   </form>
                                   
                                   
                               <!-- bouton ajout aux favoris -->
                               <form method="POST" action="#validation">
                                        <input type="hidden" name="addWishList" value="<?= $datas['id'];?>" >
                                        <button type="submit" name="submitWishlist" title="Add this item to your wishlist"
                                             style="border:none;outline:none;background:transparent;width:100%;text-align:right;position:absolute;top:20px;left:-20px;">
                                             <span><i class="fas fa-heart"></i></span>
                                        </button>
                                   </form>
                              </span>
                          </div>
                          <!-- image de la card -->
                          <div style="width:30%;">
                              <img src="<?= $datas['img']; ?>" alt="dish" style="max-width:100%;" width="250" height="140"/>
                          </div>
                    </div>
          </div>       
          <?php endforeach; ?>
          </div>  
     <!-- end section dish --> 
     <!-- section dessert -->

     <?php if(count($dataresto2) == 0) : ?>
          <H4>OUR SWEET SELECTION</H4>
          <hr>
           <p>Le restaurant vous proposera sa selection sucrée très prochainement</p>
          <?php else : ?>
          <H4>OUR SWEET SELECTION</H4>
          <hr>
          <div style="display:flex;flex-flow:row wrap;justify-content:space-between;margin-top:40px;" class="">

          <?php foreach($dataresto2 as $datas2) : ?>
               <div class="cardResto">
                    <div style="display:flex; flex-flow:row wrap;">
                         <div style="width:70%;padding:20px 20px 0 20px;position:relative;">
                         <h5><strong><?= $datas2['name']; ?></strong> <span style="font-size:10px;font-style:italic;">(<?= $datas['cal']; ?>KCAL)</span></h5>
                              <!-- description du produit -->
                              <p style="font-size:12px;"><?= $datas2['description']; ?></p>
                              <!-- affichage du prix unitaire -->
                              <span style="font-size:12px;font-weight:bold;color:#3cb6c9">$<?= $datas2['price']; ?>
                             
                                   <form method="POST" action="#validation" style="display:inline;margin-left:40px;">
                                        <!-- ajouter ou supprimer quantité -->
                                         <input type="number" name="qteCart" class="qt" value="1" min="1" 
                                         style="border:none;width:30px;backround-color:grey;outline:none;border:0.5px solid #3cb6c9;"/>
                                        <!-- recuperer nom du produit -->
                                        <input type="hidden" name="nomItem" value="<?= $datas2['name']; ?>">
                                        <!-- recuperer nom du produit -->
                                         <input type="hidden" name="unitPrice" value="<?= $datas2['price']; ?>">
                                        <!-- valider -->
                                        <button type="submit" name="cartButton" style="border:none;background-color:#3cb6c9;border-radius:40px;color:white;padding:2px 5px;">
                                             <span class="addCart">Add to cart</span>
                                        </button>
                                   </form>
                              </span>

                              <form method="POST" action="#validation">
                                        <input type="hidden" name="addWishList" value="<?= $datas2['id'];?>" >
                                        <button type="submit" name="submitWishlist" title="Add this item to your wishlist"
                                             style="border:none;outline:none;background:transparent;width:100%;text-align:right;position:absolute;top:20px;left:-20px;">
                                             <span><i class="fas fa-heart"></i></span>
                                        </button>
                              </form>
                          </div>
                          <!-- image de la card -->
                          <div style="width:30%;">
                              <img src="<?= $datas2['img']; ?>" alt="dish" style="max-width:100%;" width="250" height="140"/>
                          </div>
                          
                    </div>
               </div>      
               
          <?php endforeach; ?>  
          <?php endif; ?> 
          </div>
     </div>  
     
     <?php endif; ?>
</main>
<?php include_once './_includes/footer.php'; ?> 
<!-- script increment quantity -->



<!-- script infinite scroll -->
<script>
    document.addEventListener(
    "DOMContentLoaded",
    function () {
        let options = {
            root: null,
            rootMargin: "0px 0px 50px 0px",
            threshold: 0.5
        };

        let observer = new IntersectionObserver(showMore, options);

        let target = document.querySelector(".rm");
        observer.observe(target);
    },
    false
);

function showMore() {
    let btn = document.querySelector(".rm");
    let template = document.getElementById("temp");
    let main = document.querySelector("main");
    let cloned = template.content.cloneNode(true);

    main.insertBefore(cloned, btn);
}

// test



</script>
</body>
</html>