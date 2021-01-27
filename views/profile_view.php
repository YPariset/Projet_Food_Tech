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
        <div class="col-sm-9">  
                <div class="panel rounded shadow">
                     <div class="panel-card" style="min-height: 600px; width:600px;margin-bottom: 200px; padding:20px;">
                     <?php if(isset($_GET['action']) && $_GET['action'] == 'editer') : ?>
                        <h1>Edit Your informations</h1>


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