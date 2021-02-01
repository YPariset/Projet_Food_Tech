<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body style="height:auto;">
<?php include_once '_includes/header-banner.php'; ?>  

<div style="margin-top:150px;padding:20px;">

<h1>Shopping Cart</h1>

<div class="shopping-cart">

<a href="index.php?page=restaurant&resto=2" >back</a>

<!-- si le panier n'est pas vide, on boucle le nombre d'articles... -->
<?php if(isset($_SESSION['panier'])) : ?>
     <?php if(count($_SESSION['panier']['nom'])) : ?>
     <?php for($i = 0; $i < count($_SESSION['panier']['nom']); $i++) : ?>
          <!-- on recupere les datas des dishes-->
          <?php $datasFoods = $getFood->getProductByDish($_SESSION['panier']['nom'][$i]); ?>
               <!-- on boucle sur les product supplement -->
               
                    <div class="product" style="display:flex;flex-flow:row wrap; justify-content:space-around;">
                         <div class="product-details">
                              <span class="product-title"><?= $i+1?> - <?= $_SESSION['panier']['nom'][$i]; ?></span>
                         </div>
                         <span class="product-price"><?= $_SESSION['panier']['prix'][$i] ?></span>
                         <div class="product-quantity">
                              <form action="" method="POST">
                                   <input type="number" name="qte" value="<?= $_SESSION['panier']['quantite'][$i] ?>" min="1"  style="width:40px;">
                                   <input type="hidden" name="name" value="<?= $_SESSION['panier']['nom'][$i]; ?>"/>
                                   <button type="submit" name="qteValid">recalculer</button>
                              </form>
                         </div>
                         <div class="product-removal">
                              <form action="" method="POST">
                                   <input type="hidden" name="nameDelete" value="<?= $_SESSION['panier']['nom'][$i]; ?>"/>
                                   <button type="submit" name="remove" class="remove-product">
                              </form>
                              Remove
                              </button>
                         </div>
                         <div class="product-line-price"><?= $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i] ?></div>
                         </div>
                    </div>
                              
                    
                    <hr>
          <!--<p class="product-description">The best dog </p>-->
     <?php endfor; ?>

  <div class="totals">
    <div class="totals-item">
      <span>Sous-total : </span><span class="totals-value" id="cart-subtotal">$<?= $totalAmount; ?></span>
    </div>
    <hr>
    <div class="totals-item">
      <span>Tax (5%) :</span>
      <span class="totals-value" id="cart-tax">$<?= $tax; ?></span>
    </div>
    <hr>
    <div class="totals-item">
      <span>Shipping</span>
      <span class="totals-value" id="cart-shipping">free</span>
    </div>
    <hr>
    <div class="totals-item totals-item-total" style="font-size:22px;">
      <span style="font-size:22px;">Grand Total : </span>
      <span class="totals-value" id="cart-total">$<?= $_SESSION['panierMontant'] + $tax ?></span>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>
     <?php else: ?>
          <h5>Your shopping cart is empty</h5>
     <?php endif; ?>
<?php endif; ?>
</div>

</div>
</body>
</html>