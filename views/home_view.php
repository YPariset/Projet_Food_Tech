<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body>
<?php include_once '_includes/header.php'; ?> 
<main>
	<div class="section1 appear">
		<div class="text1">
			<h2>Order near by</h2>  
			<p>the best restaurants on one click !! We rigorously pick our restaurants to provide you with the best culinary experience.</p>
				<a class="btn btn-secondary" href="index.php?page=restaurant">Try !</a>
			</div>
			<div class="img1">
				<img src="_assets/image/photo_bouffe.jpg" alt=""></img>
			</div>
		</div>
		<div class="section2 appear">
			<div class="img2">
				<img src="_assets/image/imgVerticale.jpg" alt=""></img>
			</div>
			<div class="text2">
				<h2>Restaurant of the week</h2>  
				<p>Every week we highlight one of our partner restaurants. The opportunity for you to discover new flavors!</p>
					<a class="btn btn-secondary" href="index.php?page=restaurant&resto=22">Go !</a>
				</div>
			</div>
			<div class="section3 appear">
				<div class="text3">
					<h2>A desire ?</h2>  
					<p>A various range of tasty dishes to satisfy everyone.</p>
						<a class="btn btn-secondary" href="#">Try !</a>
					</div>
					<div class="img3">
						<div class="vignette"><a href="#"><img class="vignette-img" src="_assets/image/carré-de-veau.jpg" alt=""></img></a></div>
						<div class="vignette"><a href="#"><img class="vignette-img" src="_assets/image/burger.jpg" alt="" ></img></a></div>
						<div class="vignette"><a href="#"><img class="vignette-img" src="_assets/image/fois_gras.jpg" alt="" ></img></a></div>
						<div class="vignette"><a href="#"><img class="vignette-img" src="_assets/image/homard.jpg" alt="" ></img></a></div>
						<div class="vignette"><a href="#"><img class="vignette-img" src="_assets/image/blanquette.jpg" alt="" ></img></a></div>
						<div class="vignette"><a href="#"><img class="vignette-img" src="_assets/image/sushi.jpg" alt="" ></img></a></div>
					</div>
				</div>
	
				<script>
					$(window).scroll(function(){
						var scrolledFromTop = $(window).scrollTop() + $(window).height();
						$(".appear").each(function(){
							var distanceFromTop = $(this).offset().top;
							if(scrolledFromTop >= distanceFromTop+100){
								console.log("hello");
								var delaiAnim = $(this).data("delai");
								$(this).delay(delaiAnim).animate({
									top:0,
									opacity:1
								});
							}
						});
					});
					
					
					
					</script>
</main>

<?php include_once '_includes/footer.php'; ?> 
</body>
</footer>