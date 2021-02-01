<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
<?php include_once './_includes/header-banner.php'; ?> 
     
<main style="margin-top:150px;">
     

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
               
               <!-- <div class="tradi"><h2>Traditionals Restaurants</h2></div>
                    <div class="restoTradi">
                         <?php foreach($restaurantsTradi as $tradi) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $data['id']; ?>">
                                   <img class="image" src="<?= $traditional['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $data['name']; ?></h4>
                                   </div>
                                   
                              </a>
                         <?php endforeach; ?>
                    </div>        -->
               <!-- fin de test  -->
               <!-- Organic Restaurants -->
               <div class="organic"><h2>Organic restaurant</h2></div>
                    <div class="restoOrganic">
                         <?php foreach($restaurantsOrganic as $organic) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $organic['id']; ?>">
                                   <img class="image" src="<?= $organic['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $organic['name']; ?></h4>
                                   </div>         
                              </a>
                         <?php endforeach; ?>     
                    </div>
               <!-- Gastronomic restaurants -->
               <div class="gastronomique"><h2>Gastronomic Restaurant</h2></div>
                    <div class="restoGastronomique">
                         <?php foreach($restaurantsGastro as $gastro) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $gastro['id']; ?>">
                                   <img class="image" src="<?= $gastro['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $gastro['name']; ?></h4>
                                   </div>     
                              </a>
                         <?php endforeach; ?>     
                    </div>
               <!-- Restaurants Vegan -->
               <div class="vegan"><h2>Vegan Restaurant</h2></div>
                    <div class="restoVegan">
                         <?php foreach($restaurantsVegan as $vegan) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $vegan['id']; ?>">
                                   <img class="image" src="<?= $vegan['img'] ?>" alt="Alt text"/>   
                                   <div class="text">
                                        <h4><?= $vegan['name']; ?></h4>
                                   </div>  
                              </a>
                         <?php endforeach; ?>    
                    </div> 

               <!-- Fast Food -->
               <div class="fastFood"><h2>Fast Food</h2></div>
                    <div class="fastFoodResto">
                         <?php foreach($restaurantsFastFood as $fastFood) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $fastFood['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $fastFood['name']; ?></h4>
                                   </div>   
                              </a>
                         <?php endforeach; ?>     
                    </div>

               <!-- Pizza food -->
               <div class="pizza"><h2>Pizza</h2></div>
                    <div class="restoPizza">
                         <?php foreach($Pizzarestaurants as $pizza) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $pizza['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $pizza['name']; ?></h4>
                                   </div>   
                              </a>
                         <?php endforeach; ?>  
                    </div> 


               <!-- Salades -->
               <div class="salades"><h2>Salades</h2></div>
                    <div class="restoSalade">
                         <?php foreach($saladesRestaurants as $salades) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $salades['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $salades['name']; ?></h4>
                                   </div>                     
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Speciality -->
               <div class="specialites"><h2>Speciality</h2></div>
                    <div class="restoSpeciality">
                         <?php foreach($specialityRestaurants as $speciality) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $speciality['img'] ?>" alt="Alt text"/>
                                   <div class="text">
                                        <h4><?= $speciality['name']; ?></h4>
                                   </div>         
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Tacos Restaurants -->
               <div class="tacos"><h2>Tacos</h2></div>
                    <div class="restoTacos">
                         <?php foreach($tacosRestaurants as $tacos) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $tacos['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $tacos['name']; ?></h4>
                                   </div>             
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Meat Restaurants -->
               <div class="meat"><h2>Meat</h2></div>
                    <div class="restoMeat">
                         <?php foreach($meatRestaurants as $meat) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                                   <img class="image" src="<?= $meat['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $meat['name']; ?></h4>
                                   </div>         
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Pastas restaurants -->
               <div class="pastas"><h2>Pastas</h2></div>
                    <div class="restoPasta">
                         <?php foreach($pastasRestaurants as $pastas) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $pastas['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $pastas['name']; ?></h4>
                                   </div>              
                              </a>
                         <?php endforeach; ?>
                    </div>

               <!-- Desserts Restaurants -->
               <div class="desserts"><h2>Desserts</h2></div>
                    <div class="restoDesserts">
                         <?php foreach($dessertsRestaurants as $desserts) : ?>
                              <a href="index.php?page=restaurant&resto=<?= $fastFood['id']; ?>">
                              <img class="image" src="<?= $desserts['img'] ?>" alt="Alt text"/> 
                                   <div class="text">
                                        <h4><?= $desserts['name']; ?></h4>
                                   </div>           
                                   </a>
                         <?php endforeach; ?>
                    </div>
          </template>

                    <h1 class="titrePage">What would you want to eat today ?</h1>

                    <button class="rm">Read More</button>
     <?php else : ?>
              
      <!-- debut affichage du restaurant selectionné -->
          <div class="containerResto" style="width:90%;margin:60px auto;min-height:400px;">
          <?php foreach($datadejuste1rest as $data) : ?>
                    <h3><?= $data['name']; ?></h3>
                    <P style="color:#3cb6c9">FREE DELIVERY</p>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;"><i class="fas fa-clock"></i> 35-45mn</a>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;"><i class="fas fa-map-marker-alt"></i> <?= $data['address']; ?></h3></a>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;">more infos <i class="fas fa-sort-down"></i></a>
          <?php endforeach; ?>
          <br><br><br>

     <!-- section dish -->
          <H4>OUR SALTY SELECTION</H4>
          <hr>
          <div style="display:flex;flex-flow:row wrap;justify-content:space-between;margin:60px 0;">
  
          <?php foreach($datasResto as $datas) : ?>
               
               <div class="cardResto">
                    <div style="display:flex; flex-flow:row wrap;">
                         <div style="width:70%;padding:20px 20px 0 20px;">
                              <h5><strong><?= $datas['name']; ?></strong></h5>
                              <!-- description du produit -->
                              <p style="font-size:12px;"><?= $datas['description']; ?></p>
                              <!-- affichage du prix unitaire -->
                              <span style="font-size:12px;font-weight:bold;color:#3cb6c9">$<?= $datas['price']; ?>
                             
                                   <form method="POST" action="" style="display:inline;margin-left:40px;">
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


          <H4>OUR SWEET SELECTION</H4>
          <hr>
          <div style="display:flex;flex-flow:row wrap;justify-content:space-between;margin-top:40px;" class="">

          <?php foreach($dataresto2 as $datas2) : ?>

               <div class="cardResto">
                    <div style="display:flex; flex-flow:row wrap;">
                         <div style="width:70%;padding:20px 20px 0 20px;">
                              <h5><strong><?= $datas2['name']; ?></strong></h5>
                              <!-- description du produit -->
                              <p style="font-size:12px;"><?= $datas2['description']; ?></p>
                              <!-- affichage du prix unitaire -->
                              <span style="font-size:12px;font-weight:bold;color:#3cb6c9">$<?= $datas2['price']; ?>
                             
                                   <form method="POST" action="" style="display:inline;margin-left:40px;">
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
                          </div>
                          <!-- image de la card -->
                          <div style="width:30%;">
                              <img src="<?= $datas2['img']; ?>" alt="dish" style="max-width:100%;" width="250" height="140"/>
                          </div>
                    </div>
          </div>       
          <?php endforeach; ?> 
          </div>
    
     </div>       
     <?php endif; ?>
</main>
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
</script>
</body>
</html>