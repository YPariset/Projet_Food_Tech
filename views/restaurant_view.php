<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
<?php include_once './_includes/header-banner.php'; ?> 
     
<main>
     

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
          <div class="containerResto" style="width:75%;margin:60px auto;min-height:400px;padding:40px;">
          <?php foreach($datadejuste1rest as $data) : ?>
                    <h3><?= $data['name']; ?></h3>
                    <P style="color:#3cb6c9">FREE DELIVERY</p>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;"><i class="fas fa-clock"></i> 35-45mn</a>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;"><i class="fas fa-map-marker-alt"></i> <?= $data['address']; ?></h3></a>
                    <a href="#" class="btn bg-transparent" style="color:lightgrey;border:1px solid lightgrey;border-radius:40px;">more infos <i class="fas fa-sort-down"></i></a>
          <?php endforeach; ?>
          <br><br><br>
          <H4>OUR SALTY SELECTION</H4>
          <hr>
          <div style="display:flex;flex-flow:row wrap;justify-content:space-between;margin:60px 0;">
  
          <?php foreach($datasResto as $datas) : ?>
               
               <a href="#" class="cardResto">
                    <h5><strong><?= $datas['name']; ?></strong></h5>
                    <p style="font-size:12px;"><?= $datas['description']; ?>
                    <p style="font-size:12px;font-weight:bold;color:#3cb6c9">$<?= $datas['price']; ?></p>
                    </a>
          <?php endforeach; ?>
          </div>

          <H4>OUR SWEET SELECTION</H4>
          <hr>
          <div style="display:flex;flex-flow:row wrap;justify-content:space-between;margin-top:40px;" class="">
  
          <?php foreach($dataresto2 as $datas2) : ?>
               
               <a href="#" class="cardResto">
                    <h5><strong><?= $datas2['name']; ?></strong></h5>
                    <p style="font-size:12px;"><?= $datas2['description']; ?>
                    <p style="font-size:12px;font-weight:bold;color:#3cb6c9">$<?= $datas2['price']; ?></p>
                    </a>
          <?php endforeach; ?>

          </div>






          </div>       
     <?php endif; ?>
</main>

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