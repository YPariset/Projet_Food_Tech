<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body style="height:auto;">
<?php include_once '_includes/header-banner.php'; ?>  
<div class="container bootstrap snippets">
<h1 class="mb-1" style="padding-top:60px; padding-bottom:60px">profile</h1>
<div class="row">
    <!-- Panel user -->
    <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="panel rounded shadow">
            <div class="panel-card" style="min-height: 600px; margin-bottom: 200px; padding:20px;">
                    <ul class=infoPanel>
                        
                        <li><img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="John Doe"><span class="editAvatar"><a href="#"><i class="fas fa-pen"></i></a></span></li>
                        <li class="text-center"><h4 class="text-capitalize">
                            <?php if(isset($_SESSION['firstname'])){echo $_SESSION['firstname'];} ?>
                            </h4><p class="text-muted text-capitalize">
                            <?php if(isset($dataClient['birthday'])){echo $dataClient['birthday'];} ?>
                            </p>
                        </li>
                        <li style="width:100%;"><a href="index.php?page=restaurant" class="btn btn-success text-center btn-block" style="display:block;margin:0 auto;">Order</a></li>
                        <li><br><br></li>
                    </ul>
                    <p class="pointLabel"><span class="pointsN">
                    <?php if(isset($getPoints['points'])){ echo $getPoints['points'];}  ?>
                    </span><br><span class="points">Foodies</span>
                            </span> <span class="award"><i class="fas fa-award "></i></span></p><br>

                        <div class="btn-group-vertical btn-block sectionProfile">
                            <a href="index.php?page=profile&action=editer" class="sectionUserA"><span class="iconUser" ><i class="fa fa-cog pull-right"></i></span> Edit Account</a>
                            <a href="index.php?page=profile&action=history" class=" sectionUserA"><span class="iconUser" ><i class="fas fa-history"></i></span> Order history</a>
                            <a href="index.php?page=profile&action=wishlist" class="sectionUserA"><span class="iconUser" ><i class="fas fa-heart"></i></span> Wishlist</a>
                            <a href="index.php?page=profile&action=promo"  class="sectionUserA"><span class="iconUser"><i class="fas fa-percentage"></i></span> My offers</a>
                            <a href="index.php?page=logout" class="sectionUserA"><span class="iconUser" ><i class="fas fa-sign-out-alt"></i></span> Logout</a>
                        </div>
               </div>
        </div>
        </div>  
     <!-- end Panel user -->

      <!-- start preview  -->
        <div class="col-sm-9 bloc_edit">  
                <div class="panel rounded shadow">
                     <div  style="min-height: 600px; width:100%;margin-bottom: 200px; padding:20px;">
                     <?php if(isset($_GET['action']) && $_GET['action'] == 'editer') : ?>
                        <h1>Edit Your informations</h1>
                        <?php if(isset($alertEdit)){echo $alertEdit;} ?>

            <!-- Alerts messages -->
            <?php if(isset($alertUpdate)){ echo $alertUpdate; } ?>

        <!-- start Form update -->
        <div class="adminForm">
        <?php Form::startForm('""', 'POST', 'Form'); ?>
            <div class="col-sm-8 mb-3">
                <?php Form::createLabel('adFirstName', 'form-label', 'First name'); ?>
                <?php Form::createFieldWithValue('prenom', 'form-control' , 'text', $_SESSION['firstname']); ?>
            </div>
            <div class="col-sm-8 mb-3">
                <?php Form::createLabel('adLastName', 'form-label', 'Last name'); ?>
                <?php Form::createFieldWithValue('nom', 'form-control' , 'text', $_SESSION['lastname']); ?>
            </div>
            <div class="col-sm-8 mb-3">
                <?php Form::createLabel('username', 'form-label', 'Username'); ?>
                <?php Form::createFieldWithValue('username', 'form-control' , 'text', $_SESSION['username']); ?>
            </div>
            <div class="col-sm-8 mb-3">
                <?php Form::createLabel('street', 'form-label', 'Street'); ?>
                <?php Form::createFieldWithValue('street', 'form-control' , 'text', $dataClient['street']); ?>
            </div>
            <div class="col-sm-8 mb-3">
                <?php Form::createLabel('zip', 'form-label', 'Zip'); ?>
                <?php Form::createFieldWithValue('zip', 'form-control' , 'text', $dataClient['zip']); ?>
            </div>
            <div class="col-sm-8 mb-3">
                <?php Form::createLabel('city', 'form-label', 'City'); ?>
                <?php Form::createFieldWithValue('city', 'form-control' , 'text', $dataClient['city']); ?>
            </div>
            <div class="col-sm-8 mb-3">
                <?php Form::createLabel('adMail', 'form-label', 'Email'); ?>
                <?php Form::createFieldWithValue('email', 'form-control' , 'text', $_SESSION['email']); ?>
            </div>
    
            <div class="col-8">
                <?php Form::createSubmit('submit', 'btn btn-primary', 'updateUser', 'done', 'Modifier'); ?>
            </div>
        <?php Form::endForm(); ?>
        </div>
        <!-- end form update -->

                        <!-- start history -->
                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'history') : ?>
                            <?php if(!isset($_GET['id'])) : ?>
                                <h3>My historic</h3><br><br>
                            <div class="legends">
                                    <div class="ord dorderNumero"><span class="orderNumero">Order n°</span></div>
                                    <div class="ord dqtyOrder"><span class="qtyOrder">Date</span></div>
                                    <div class="ord ddateO"><span class="dateO">Amount</span></div>
                                    <div class="ord icon"><span class="icon">Details</span></div>
                                </div>
                                <hr>
                                <?php foreach($orderOrder as $orderList) : ?>
                                <div class="legends">
                                    <div class="ord dorderNumero"><span class="orderNumero"><?= $orderList['number']; ?></span></div>
                                    <div class="ord dateO"><span class="dateO"><?= $orderList['date_order']; ?></span></div>
                                    <div class="ord amount"><span class="amount"><?= number_format($orderList['total_price'],2); ?>$</span></div>
                                    <div class="ord icon"><a class="icon" href="index.php?page=profile&action=history&id=<?= $orderList['id']; ?>"><span class="eye"><i class="far fa-eye"></i></a><br></div>
                                </div>     
                                <?php endforeach; ?>
                            
                            <?php else :  ?>
                            
                                <!-- affichage contenu d'une commande -->
                                <h3>Order détails</h3><br>
                                <div class="legends">
                                    <div class="ord dview"><span class="view">View</span></div>
                                    <div class="ord dtitle"><span class="title">Name</span></div>
                                    <div class="ord dorderNumero"><span class="orderNumero">N° Order</span></div>
                                    <div class="ord dqtyOrder"><span class="qtyOrder">Quantity</span></div>
                                    <div class="ord ddateO"><span class="dateO">Date</span></div>
                                    <div class="ord ddateO"><span class="dateO">Price</span></div>
                                </div>
                                <hr>
                            <?php foreach($getOrderContent as $orderContentList) : ?>
                               
                                <div class="legends">
                                    <div class="ord dview"><span class="view"><img src="<?= $orderContentList['img']; ?>" width="50" height="50"></span></div>
                                    <div class="ord dtitle"><span class="title"><?= $orderContentList['name']; ?></span></div>
                                    <div class="ord dorderNumero"><span class="orderNumero"><?= $orderContentList['number']; ?></span></div>
                                    <div class="ord dqtyOrder"><span class="qtyOrder"><?= $orderContentList['item_quantity']; ?></span></div>
                                    <div class="ord ddateO"><span class="dateO"><?= $orderContentList['date_order']; ?></span></div>
                                    <div class="ord ddateO"><span class="dateO"><?php echo number_format($orderContentList['price'] * $orderContentList['item_quantity'],2); ?>$</span></div>
                                </div><br>                           
                                
                            <?php endforeach; ?>
                            <br><br>
                                <a href="index.php?page=profile&action=history" class="btn btn-primary backOrder">back</a>
                            <?php endif;?>
                        <!-- end history -->

                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'wishlist') : ?>
                        <h1>Whishlist</h1>  
                        <div class="wishlist_container">  
                        <?php foreach($wishlist as $itemList) : ?>
                            
                            <div class="overlay-image">
                                <a href="index.php?page=dish&id=<?= $itemList['id'] ?>">
                                <img class="image" src="<?= $itemList['img'] ?>" alt="Alt text" />
                                    <div class="text">
                                        <?= $itemList['name']; ?> 
                                    </div>
                                </a>
                                <span class="wish is-active"><a href="#"><i class="far fa-heart"></i></a></span> 
                            </div>
                        <?php endforeach; ?>
                        </div>

                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'promo') : ?>
                            <h3>My offers</h3><br><br>
                            <div class="legends">
                                    <div class="ord dtitle"><span class="title">Offer</span></div>
                                    <div class="ord dorderNumero"><span class="orderNumero">start date</span></div>
                                    <div class="ord dqtyOrder"><span class="qtyOrder">End date</span></div>
                                    <div class="ord ddateO"><span class="dateO">Quantity</span></div>
                                    <div class="ord ddateO"><span class="dateO">Amount</span></div>
                                </div>
                                <hr>
                            <?php foreach($discounts as $discount) : ?>
                                <div class="legends">
                                    <div class="ord dview"><span class="view"><?= $discount['name']; ?></span></div>
                                    <div class="ord dtitle"><span class="title"><?= $discount['start_date']; ?></span></div>
                                    <div class="ord dorderNumero"><span class="orderNumero"><?= $discount['end_date']; ?></span></div>
                                    <div class="ord dqtyOrder"><span class="qtyOrder">1 coupon</span></div>
                                    <div class="ord ddateO"><span class="dateO"><?= $discount['amount']; ?>$</span></div>
                                </div>

                            <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
            </div>
        </div>
       

        <!-- end preview  -->
</div>
</div>

<?php include_once '_includes/footer.php'; ?> 
<script>
var $buttons = $(".button-like");

// Click button
$buttons.on('click', function () {
  var $button = $(this);
  
  // Button Off
  if ($button.hasClass('is-active')) {
    $button
      .removeClass('is-active');
    return;
  }
  
  // Button On (with a loader)
  $button.addClass('is-loading');  
  setTimeout(function () {
    $button
      .removeClass('is-loading')
      .addClass('is-active');
  }, 50);
});

</script>
</body>
</html>