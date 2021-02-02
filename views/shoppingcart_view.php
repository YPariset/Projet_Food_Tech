<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body >
<?php include_once '_includes/header-banner.php'; ?>  

<div class="containerCArt" id="containerShop" style="min-height:2500px;">
     
     

     
     <!-- si le panier n'est pas vide, on boucle le nombre d'articles... -->
     <?php if(isset($_SESSION['panier'])) : ?>
          <div><a class="btn btn-secondary" href="index.php?page=restaurant">back </a></div><br>
          <div class="titleShopCart">
               <div><h2 >My Cart</h2></div>
          </div>
          <?php if(count($_SESSION['panier']['nom'])) : ?>

          <?php for($i = 0; $i < count($_SESSION['panier']['nom']); $i++) : ?>
               <!-- on recupere les datas des dishes-->
               <?php $datasFoods = $getFood->getProductByDish($_SESSION['panier']['nom'][$i]); ?>
               
                    <div class="productCART">
                         <div class="product-details" style="width:20%;text-align:left;">
                              <p class="product-title"><?= mb_strtoupper($_SESSION['panier']['nom'][$i]); ?></p>
                         </div>
                         
                         
                         
                         <div class="product-quantity"style="width:18%;text-align:left;" >
                              <form action="" method="POST">
                              <span class="product-price" >$<?= number_format($_SESSION['panier']['prix'][$i],2) ?>  x  </span>
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
          <!--<p class="product-description">The best dog </p>-->
     <?php endfor; ?>
     <hr>
<div class="containerPrice">
          
  <div class="totals">
      <div class="totals-item">
               <div><p class="labelCart subtotal">Sub-total  </p></div>
               <div><p class="totals-value" id="cart-subtotal">$<?= $totalAmount; ?></p></div>
               
     </div>
    
     <div class="totals-item">
         <div> <p class="labelCart">Tax (5%) </p></div>
          <div><p class="totals-value" id="cart-tax">$<?= $tax; ?></p></div>
     </div>
    
     <div class="totals-item">
              <div> <p class="totals-value" id="cart-shipping">Shipping </p></div>
               <div><p class="totals-value">free</p></div>
     </div>
     
     <div class="totals-item-coupon">
               <span>Coupon</span>
               <form method="post" action="" style="display:inline;"></span>
               <span><input type="text" class="totals-value" id="cart-shipping" name="coupon"
                    style="width:140px;margin-right:10px;margin-left:180px;"></span>
               <span><button name="validCoupon" style="border:none;outline:none;background:transparent;color:#7cedfc;"><i class="fas fa-check"></i></button></span>
           </div>
          
    
          <?php if(isset($dataCoupon)) : ?>
               <span style="color:red;"> Coupon <?= $dataCoupon['name'] ?> : + $<?= $dataCoupon['amount'] ?> </span>
          <?php endif; ?>
     <div class="totals-item totals-item-total" style="font-size:22px;">
          <span style="font-size:22px;">Grand Total  </span>
          <span class="totals-value" id="cart-total">$<?= $_SESSION['panierMontant'] + $tax ?></span>
     </div>
</div>
 </div>

<a class="checkout btn btn-secondary" id="checkout" style=margin-top:-20px; >Checkout</a>

<div style=height:440px;></div>
     <div class="titleShopCart">
      <div><h2 >Please confirm your position</h2></div>
      <div><a class="btn btn-secondary" href="index.php?page=restaurant">back to restaurants</a></div>
</div>
 
     <div class="formConfirmGeo">
          
         <input class="form-control géoloc" type="text" placeholder="Default input" value="<?= $_SESSION['street'] ?> - <?= $_SESSION['zip'] ?> <?= $_SESSION['city'] ?>">
          <a class=" btn btn-secondary validGeoloc" name="validGeoloc" id="validGeoloc">confirm your position</a>
      </div>

<div style=height:530px;text-align:center;></div>
     <div class="titleShopCart">
     <div><a class=" btn btn-secondary proceed" name="proceed" id="proceed">Order and proceed to payment now</a></div>
     <div>
          <h4 >Order Summary</h4><br>
          <p>Mr <?= $_SESSION['firstname'] ?> <?= $_SESSION['lastname'] ?>
          <p>address : <?= $_SESSION['street'] ?> - <?= $_SESSION['zip'] ?> <?= $_SESSION['city'] ?>
          <p> order date : <?= date("Y/m/d") ?> at <?= date("H:i") ?></p>
          <?php for($i = 0; $i < count($_SESSION['panier']['nom']); $i++) : ?>
          <p>Dish n°<?= $i +1 ?> : <?= $_SESSION['panier']['nom'][$i]; ?> X <?= $_SESSION['panier']['quantite'][$i]; ?>  for  <?= $_SESSION['panier']['prix'][$i]; ?>$ </p> 
          <p>Total Amount : <?= $_SESSION['panierMontant'] +  $tax; ?>$</p>
          <?php endfor; ?>

     </div>

</div>



     <?php else: ?>
          
          <h5>Your shopping cart is empty</h5>
     <?php endif; ?>
<?php endif; ?>
</div>


</body>
</html>

<script>
     const btn = document.getElementById('checkout');

          btn.addEventListener('click', () => window.scrollTo({
          top: 1000,
          behavior: 'smooth',
          }));
          btn.addEventListener('click', function(color){
               if(btn.textContent.value = "Checkout"){
                    btn.style.background = "green";
                    btn.textContent = "Registered"
               }
               
          });
          const validGeoloc = document.getElementById('validGeoloc');
          validGeoloc.addEventListener('click', () => window.scrollTo({
          top: 1700,
          behavior: 'smooth',
          }));
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