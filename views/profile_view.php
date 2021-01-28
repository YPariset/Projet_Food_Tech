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
            <div class="panel-card" style="height: 600px; margin-bottom: 200px; padding:20px;">
                    <ul class=infoPanel>
                        <li><img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="John Doe"></li>
                        <li class="text-center"><h4 class="text-capitalize">
                            <?php if(isset($_SESSION['firstname'])){echo $_SESSION['firstname'];} ?>
                            </h4><p class="text-muted text-capitalize">
                            <?php if(isset($dataClient['birthday'])){echo $dataClient['birthday'];} ?>
                            </p>
                        </li>
                        <li style="width:100%;"><a href="index.php?page=order" class="btn btn-success text-center btn-block" style="display:block;margin:0 auto;">Order</a></li>
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
                            <a href="index.php?page=logout" class="sectionUserA"><span class="iconUser" ><i class="fas fa-sign-out-alt"></i></span> Logout</a>
                        </div>
               </div>
        </div>
        </div>  
     <!-- end Panel user -->

      <!-- start preview  -->
        <div class="col-sm-9 bloc_edit">  
                <div class="panel rounded shadow">
                     <div class="panel-card" style="min-height: 600px; width:600px;margin-bottom: 200px; padding:20px;">
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


                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'history') : ?>
                        <h1>Historic</h1>
                            <div class="col-sm-6">
                            <div class="panel rounded shadow">
                                <div class="panel-card" style="height: 300px; padding:20px;">
                        <?php foreach($orderOrder as $orderList) : ?>
                                    <a href="index.php?page=profile&action=history&id=<?= $orderList['id']; ?>"><span>
                                        <?= $orderList['id']; ?> - 
                                        <?= $orderList['total_price']; ?> - 
                                        <?= $orderList['date_order']; ?> 
                                    </span></a><br>
                        <?php endforeach; ?>
                                </div>
                            </div>
                        

                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'history') : ?>
                        <h1>Whishlist</h1>  
                        
                        <?php foreach($wishlist as $itemList) : ?>
                        <div class="col-sm-6">
                            <div class="panel rounded shadow">
                                <div class="panel-card" style="height: 300px; padding:20px;">
                                    <img src="" alt=""/>
                                    <h2><?= $itemList['name']; ?></h2>
                                    <h3><?= $itemList['price']; ?></h3>
                                    <span class="wish"><i class="far fa-heart"></i></span>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
       

        <!-- end preview  -->
</div>
</div>

<?php include_once '_includes/footer.php'; ?> 
</body>
</html>