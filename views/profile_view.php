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
                        <li class="text-center"><h4 class="text-capitalize">John Doe</h4><p class="text-muted text-capitalize">web designer</p></li>
                        <li><a href="index.php?page=order" class="btn btn-success text-center btn-block" style="margin-left:47px;">PRO Account</a></li>
                        <li><br><br></li>
                    </ul>
                    <p class="pointLabel"><span class="pointsN">20 </span><br><span class="points">Foodies</span>
                            </span> <span class="award"><i class="fas fa-award "></i></span></p><br>

                        <div class="btn-group-vertical btn-block sectionProfile">
                            <a href="index.php?page=profile&action=editer" class="sectionUserA"><span class="iconUser" ><i class="fa fa-cog pull-right"></i></span> Edit Account</a>
                            <a href="index.php?page=profile&action=history" class=" sectionUserA"><span class="iconUser" ><i class="fas fa-history"></i></span> Order history</a>
                            <a href="index.php?page=profile&action=wishlist" class="sectionUserA"><span class="iconUser" ><i class="fas fa-heart"></i></span> Wishlist</a>
                            <a href="index.php?page=logout" class=" sectionUserA"><span class="iconUser" ><i class="fas fa-sign-out-alt"></i></span> Logout</a>
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
                       <?php Form::startForm( '""',  "POST",  "FormEdit") ?>
                            <div class="col-md-6">
                                <?php Form::createLabel('inputFirstName', 'form-label', 'First name'); ?>
                                <?php Form::createFieldWithValue("firstname", "firsname", "text", $getDataClient['firstname']) ?>
                            </div>
                            <div class="col-md-6">
                                <?php Form::createLabel('lastname', 'form-label', 'Last name'); ?>
                                <?php Form::createFieldWithValue("lastname", "lastname", "text", $getDataClient['lastname']) ?>
                            </div>    
                            <div class="col-md-6">
                                <?php Form::createLabel('username', 'form-label', 'Username'); ?>
                                <?php Form::createFieldWithValue("username", "username", "text", $getDataClient['username']) ?>
                            </div>
                            <div class="col-md-6">
                                <?php Form::createLabel('email', 'form-label', 'Email'); ?>
                                <?php Form::createFieldWithValue("email", "email", "email", $getDataClient['email']) ?>
                            </div>
                            <div class="col-md-6">
                                <?php Form::createLabel('password', 'form-label', 'Password'); ?>
                                <?php Form::createFieldWithValue("password", "password", "password", $getDataClient['password']) ?>
                            </div>
                            <div class="col-md-6">
                                <?php Form::createLabel('streetSign', 'form-label', 'Street'); ?>
                                <?php Form::createFieldWithValue("streetSign", "streetSign", "text", $getDataClient['street']) ?>
                            </div>
                            <div class="col-md-6">
                                <?php Form::createLabel('zipSign', 'form-label', 'Zip'); ?>
                                <?php Form::createFieldWithValue("zipSign", "zipSign", "text", $getDataClient['zip']) ?>
                            </div>
                            <div class="col-md-6">
                                <?php Form::createLabel('citySign', 'form-label', 'City'); ?>
                                <?php Form::createFieldWithValue("citySign", "citySign", "text", $getDataClient['city']) ?>
                            </div>
                            <div class="col-md-6">
                                <?php Form::createLabel('birthday', 'form-label', 'Birthday'); ?>
                                <?php Form::createFieldWithValue("birthday", "birthday", "date", $getDataClient['birthday']) ?>
                            </div>
                            <div class="col-12" style="padding-top: 20px">
                                <?php Form::createSubmit('submit', 'btn btn-primary', 'submit', 'done', 'Save'); ?>
                            </div>
                        <?php Form::endForm() ?>

                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'history') : ?>
                        <h1>Historic</h1>


                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'wishlist') : ?>
                        <h1>Whishlist</h1>  


                        
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