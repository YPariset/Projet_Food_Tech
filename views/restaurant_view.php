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
               <a href="index.php?page=restaurant&resto=<?= $data['id']; ?>">
                    <h4><?= $data['name']; ?></h4>
                    <h5><?= $data['address']; ?></h5>
               </a>
          <?php endforeach; ?>
               <div class="resto"><p>Salut je suis le contenu 1</p></div>
               <div class="vegan"><p>Salut je suis le contenu 1</p></div>
               <div class="tendances"><p>Salut je suis le contenu 1</p></div>
               <div class="organic"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
               <div class="specialites"><p>Salut je suis le contenu 1</p></div>
          </template>

                    <h1>Salut c'est toutes les categories</h1>

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