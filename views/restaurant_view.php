<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
<?php include_once './_includes/header-banner.php'; ?> 
     
<main>
     <?php if(!isset($_GET['cat'])) :?>
          <template id="temp">
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
          </template>

                    <h1>Salut c'est toutes les categories</h1>

                    <button class="rm">Read More</button>
     <?php else : ?>
          <?php if($_GET['cat'] == 'restaurant') : ?>

               <?php elseif($_GET['cat'] == 'vegan') : ?>


               <?php elseif($_GET['cat'] == 'organic') : ?>


               <?php elseif($_GET['cat'] == 'speciality') : ?>


               <?php elseif($_GET['cat'] == 'trend') : ?>


               <?php elseif($_GET['cat'] == 'hotdeals') : ?>


               <?php elseif($_GET['cat'] == 'burgers') : ?>


               <?php elseif($_GET['cat'] == 'seafood') : ?>
                    

               <?php elseif($_GET['cat'] == 'gastronomy') : ?>



          <?php endif ;?>          
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