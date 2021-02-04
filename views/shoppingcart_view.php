<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body >
<?php include_once '_includes/header-banner.php'; ?>  

<div class="containerCArt" id="containerShop" style="max-height:100%;">

     
     <!-- si le panier n'est pas vide, on boucle le nombre d'articles... -->
     <?php if(isset($_SESSION['panier'])) : ?>
          
          <div class="titleShopCart">
               <div><h2 >My Cart</h2></div>
               <div class="column-labels">
                    <label class="label-product">Product</label>
                    <label class="label-price">Price</label>
                    <label class="label-qty">Quantity</label>
                    <label class="label-line-price">Total</label>
               </div>
          </div>
          <?php if(count($_SESSION['panier']['nom'])) : ?>
          

          <?php for($i = 0; $i < count($_SESSION['panier']['nom']); $i++) : ?>
               <!-- on recupere les datas des dishes-->
               <?php $datasFoods = $getFood->gettheDishByname($_SESSION['panier']['nom'][$i]); ?>
                    <div class="productCART">
                         <div class="product-img">
                              <img src="<?= $datasFoods['img']; ?>" alt="product" height="80" width="80" style="border-radius: 5px"/>
                         </div>
                         <div class="product-details" style="width:20%;text-align:left;">
                              <strong><p class="product-title"><?= mb_strtoupper($_SESSION['panier']['nom'][$i]); ?></p></strong>
                              <p class="product-description" style="font-size: 12px; font-family: Helvetica, sans-serif;"><?= mb_strtoupper($datasFoods['description']); ?></p>
                         </div>
                         <div class="product-p"style="width:20%;text-align:left;">
                              <span class="product-price">$<?= number_format($_SESSION['panier']['prix'][$i],2) ?></span>
                         </div>
                         <div class="product-quantity"style="width:20%;text-align:left;" >
                              <form action="" method="POST">
                                   <input type="hidden" name="name" value="<?= $_SESSION['panier']['nom'][$i]; ?>" style="width:1%;"/>
                                   <input type="number" name="qte" value="<?= $_SESSION['panier']['quantite'][$i] ?>" min="1"  style="width:40px;">
                                   <button type="submit" name="qteValid" style="border:none;outline:none;background:transparent;color:#7cedfc;"><i class="fas fa-check"></i></button>
                              </form>
                         </div>
                         <div class="product-line-price">$<?php echo number_format($_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i],2); ?></div>
                         <div class="product-removal">
                              <form action="" method="POST">
                                   <input type="hidden" name="nameDelete" value="<?= $_SESSION['panier']['nom'][$i]; ?>"/>
                                   <button type="submit" name="remove" class="remove-product" ><i class="fas fa-times-circle"></i></i></button>
                              </form>
                         </div>
                    </div>          
     <?php endfor; ?>
     <hr>   
<div class="containerPrice">
     <div class="totals">
          <div class="totals-item">
               <div><p class="labelCart subtotal" style="color:grey">Sub-total  </p></div>
               <div><p class="totals-value" id="cart-subtotal">$<?= $totalAmount; ?></p></div>
          </div>
          <div class="totals-item">
               <div><p class="labelCart" style="color:grey">Tax (5%) </p></div>
               <div><p class="totals-value" id="cart-tax">$<?= $tax; ?></p></div>
          </div>
          <div class="totals-item">
               <div><p class="totals-value" id="cart-shipping" style="color:grey">Shipping </p></div>
               <div><p class="totals-value">free</p></div>
          </div>
          <div class="totals-item-coupon">
               <span style="color:grey;">Coupon</span>
               <form method="post" action="" style="display:inline;"></span>
               <span><input type="text" class="totals-value" id="cart-shipping" name="coupon" style="width:140px;margin-right:10px;margin-left:180px;"></span>
               <span><button name="validCoupon" style="border:none;outline:none;background:transparent;color:#7cedfc;"><i class="fas fa-check"></i></button></span>
          </div>
     
          <?php if(isset($dataCoupon)) : ?>
               <span style="color:red;"> Coupon <?= $dataCoupon['name'] ?> : + $<?= $dataCoupon['amount'] ?></span>
          <?php endif; ?>

          <div class="totals-item totals-item-total" style="font-size:22px;">
               <strong><span style="font-size:22px; color:grey;">Grand Total</span></strong>
               <span class="totals-value" id="cart-total">$<?= $_SESSION['panierMontant'] + $tax ?></span>
          </div>
     </div>
</div>

<div class="buttonNav">
     <a class="btn btn-secondary" id="back" href="index.php?page=restaurant">back</a>
     <a class="btn btn-secondary" id="checkout">Checkout</a>
</div>
</div>  

<div id="step2" style="border: 1px solid transparent; padding-left: 30%; margin-top: 50px">
     <form>
          <div class="group">      
               <input id="locInput" type="text" style="margin-top:350px; background-color: transparent;" placeholder="<?= $_SESSION['street']; ?> <?= $_SESSION['zip']; ?>  <?= $_SESSION['city']; ?> " >
               <span class="highlight"></span>
               <span class="bar"></span>
               <label id="labelInput">Please confirm your position</label>
          </div>
     </form>
     <div class="buttonNav2"style="margin-bottom:250px;">
          <a class="btn btn-secondary" href="index.php?page=restaurant" id="back">Back to restaurants</a>
          <a class="btn btn-secondary" name="validGeoloc" id="validGeoloc">Confirm your position</a>
     </div>
</div>
     

<div id="step3" style="padding-left: 10%; padding-top: 50px; padding-bottom: 200px">
     <div class="col-lg-8 col-md-3 col-sm-4">
        <div class="panel rounded shadow" style="margin-left:25%;">
               <div class="panel-card" style="height: auto; padding:20px; padding-left:10%">
                    <h4>Order Summary</h4><br>
                    <strong><p>Mr</strong> <?= $_SESSION['firstname'] ?> <?= $_SESSION['lastname'] ?>
                    <strong><p>Delivery address : </strong><span id="deliveryAddress"><?= $_SESSION['street'] ?> - <?= $_SESSION['zip'] ?> <?= $_SESSION['city'] ?></span></p>
                    <strong><p>Order date : </strong><?= date("Y/m/d") ?> at <?= date("H:i") ?></p>
                    <?php for($i = 0; $i < count($_SESSION['panier']['nom']); $i++) : ?>
                         <strong><p>Dish n°<?= $i +1 ?> : </strong><?= $_SESSION['panier']['nom'][$i]; ?> X <?= $_SESSION['panier']['quantite'][$i]; ?>  for  <?= $_SESSION['panier']['prix'][$i]; ?>$ </p> 
                    <?php endfor; ?>
                         <strong><p>Total Amount : </strong><?= $_SESSION['panierMontant'] +  $tax; ?>$</p>
                    <a class=" btn btn-secondary proceed" name="proceed" id="proceed" style="margin-left: 20%;">Order and proceed to payment now</a>
               </div>
          </div>
     </div>
</div>
     
     <?php else: ?>
          
          <h5>Your shopping cart is empty</h5>
     <?php endif; ?>
<?php endif; ?>


</body>
</html>

<script>
     const btn = document.getElementById('checkout');

          btn.addEventListener('click', function(color){
               if(btn.textContent.value = "Checkout"){
                    btn.style.background = "green";
                    btn.textContent = "Registered"
               }
               
          });
          const validGeoloc = document.getElementById('validGeoloc');
         
          validGeoloc.addEventListener('click', function(color){
               if(validGeoloc.textContent.value = "confirm your position"){
                    validGeoloc.style.background = "green";
                    validGeoloc.textContent = "Confirmed";
               }
               
          });
          
          const proceed = document.getElementById('proceed');
          proceed.addEventListener('click', function(color){
               if(proceed.textContent.proceed = "Order and proceed to payment now"){
                    proceed.style.background = "green";
                    proceed.textContent = "Redirecting, please wait...";

                   
                    var obj = 'window.location.replace("index.php?page=payment");';
                    setTimeout(obj,3000);
               }
               
          });
          
</script>

<script>
     document.getElementById('validGeoloc').addEventListener('click', function(e){
               var locInput = document.getElementById('locInput').value
               document.getElementById('deliveryAddress').textContent = locInput;
          
     })
</script>


<script>
	$("#checkout").click(function() {
    $('html,body').animate({
        scrollTop: $("#step2").offset().top},
        'speed');
});

$("#validGeoloc").click(function() {
    $('html,body').animate({
        scrollTop: $("#step3").offset().top},
        'speed');
});
</script>