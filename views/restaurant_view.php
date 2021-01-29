<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
<?php include_once './_includes/header-banner.php'; ?> 
     
<main>
    <!-- Template Element is parsed by not rendered by the Browser -->
    <template id="temp">
        <div class="resto"><p>Salut je suis le contenu 1</p></div>
        <div class="vegan"><p>Salut je suis le contenu 1</p></div>
        <div class="tendances"><p>Salut je suis le contenu 1</p></div>
        <div class="organic"><p>Salut je suis le contenu 1</p></div>
        <div class="specialites"><p>Salut je suis le contenu 1</p></div>
        <div class="specialites"><p>Salut je suis le contenu 1</p></div>
        <div class="specialites"><p>Salut je suis le contenu 1</p></div>
    </template>

    <h1>Salut c'est toutes les categories</h1>
    <p>Natus ut id ratione qui quisquam atque, placeat eum ex magnam rerum distinctio non nihil facilis impedit? Perferendis, facilis, nisi quas modi voluptate suscipit ullam neque quisquam, porro officiis saepe.</p>
    <p>Quis maxime excepturi consectetur ducimus doloribus, provident sed veniam atque eaque debitis perspiciatis numquam obcaecati repudiandae architecto qui amet, eveniet ipsum tempora deserunt enim laudantium beatae ad eos cum! Modi.</p>
    <p>Magni reprehenderit iure maiores nulla error. Quod distinctio esse ipsa eveniet ut iure commodi neque veniam, dolorum, facere minima possimus omnis error mollitia, eos suscipit atque. Alias rem nam ipsum!</p>
    <p>Soluta, qui similique vitae iure repellendus sequi! Eius impedit architecto alias minima vitae, aliquid autem tempora consequatur hic molestiae quasi fugit! Autem rem nobis harum nostrum minima necessitatibus esse voluptatum?</p>
    <button class="rm">Read More</button>
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

    // Modify the Contents within the Template
//     cloned.querySelector(".first").textContent =
//         "Target the element while in JavaScript in order to change/overwrite the template content";
//     cloned.querySelector(".sec").textContent =
//         "This can be helpful when generating infinite scroll and using ajax to populate data. Better implementation in modern browsers could be to also use <slot> element";

    // Insert the New content into the Main element, before my hidden button
    main.insertBefore(cloned, btn);
}

</script>
</body>
</html>