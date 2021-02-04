<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body >
<?php include_once '_includes/header-banner.php'; ?>  
<div class="container bootstrap snippets" style="margin-top:100px;">
<h1 class="mb-1" style="padding-top:30px; padding-bottom:30px"></h1>
<div class="row">
    <!-- Panel user -->
    <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="panel rounded shadow">
            <div class="panel-card" style="min-height: 600px; margin-bottom: 200px; padding:20px;">
                    <!-- affichage avatar et infos -->
                <ul class=infoPanel>
                    <div class="editImg">    
                        <!-- Start imageUpload -->
                        <div class="editOver">
                            <div class="preview img-wrapper">
                                <div class="overlay">
                                    <div class="text-p"><i class="fas fa-pen pen"></i></div>
                                </div>
                                <img src="<?= $dataClient['avatar']; ?>" />
                            </div>
                        </div>
                        <div class="file-upload-wrapper">
                             <!-- form upload -->
                                <form method="post" enctype="multipart/form-data" onclick="myFunction()">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $poids_max; ?>">
                                    <input type="file" name="fichier" onclick="myFunction()" class="file-upload-native">
                                    <button type="submit" value="Envoyer" id="myButton" class="wesh btn btn-primary" style="background-color: #3cb6c9; border:none; ">ok</button>
                                </form>  
                            </div>
                        <!-- End form upload -->
                    </div>    
                        <li class="text-center"><h4 class="text-capitalize">
                            <?php if(isset($_SESSION['firstname'])){echo $_SESSION['firstname'];} ?>
                            </h4><p class="text-muted text-capitalize">
                            <?php if(isset($dataClient['birthday'])){echo $dataClient['birthday'];} ?>
                            </p>
                        </li>
                    <!-- infos -->
                        <li style="width:100%;"><a href="index.php?page=restaurant" class="btn btn-primary text-center btn-block" style="display:block;margin:0 auto; background-color: #3cb6c9; border: none;">New Order</a></li>
                        <li><br><br></li>
                    </ul>
                    <p class="pointLabel"><span class="pointsN">
                    <?php if(isset($getPoints['foodies'])){ echo $getPoints['foodies'];}  ?>
                    </span><br><span class="points">Foodies</span>
                            </span> <span class="award"><i class="fas fa-award "></i></span></p><br>

                            <div class="list-group sectionProfile">
                            <a href="index.php?page=profile&action=editer" class="list-group-item buttonList" role="button"><span class="iconUser" ><i class="fa fa-cog pull-right"></i></span> Edit Account</a>
                            <a href="index.php?page=profile&action=history" class=" list-group-item buttonList"><span class="iconUser" ><i class="fas fa-history"></i></span> Order history</a>
                            <a href="index.php?page=profile&action=wishlist" class="list-group-item buttonList"><span class="iconUser" ><i class="fas fa-heart"></i></span> Wishlist</a>
                            <a href="index.php?page=profile&action=promo"  class="list-group-item buttonList"><span class="iconUser"><i class="fas fa-percentage"></i></span> My offers</a>
                            <a href="index.php?page=logout" class="list-group-item buttonList"><span class="iconUser" ><i class="fas fa-sign-out-alt"></i></span> Logout</a>
                        </div>
               </div>
        </div>
        </div>  
     <!-- end Panel user -->
     
      <!-- start preview  -->
        <div class="col-sm-9 bloc_edit">  
                <div class="panel rounded shadow">
                     <div  style="min-height: 725px; width:100%;margin-bottom: 200px; padding:20px;">
                     <?php if(isset($_GET['action']) && $_GET['action'] == 'editer') : ?>
                        <h3>Edit Your informations</h3><br><br>
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
                                <a href="index.php?page=profile&action=history" class="btn btn-secondary backOrder" id="btnOrder">back</a>
                            <?php endif;?>
                        <!-- end history -->
                    <!-- wishlist -->
                        <?php elseif(isset($_GET['action']) && $_GET['action'] == 'wishlist') : ?>
                            <h3>My wishlist</h3><br><br>

                     <div class="accordion" id="accordionExample" style="margin-top:150px;">
                        
                     <?php if(count($wishlist) == 0): ?>
                        <br>
                         <h5 style="text-align:center;">You havent't added any favorite dish yet<h5>
                            <?php else : ?>
                            
                        <?php foreach($wishlist as $itemList) : ?>
                            <?php $dataresto = $resto->getRestaurant($itemList['id_restaurant'] ); ?>
                                
                            
                            <div class="accordion-item" style="outline:none;width:65%;margin:0 auto;">
                                <h2 class="accordion-header" id="heading<?= $itemList['id'] ?>" style="outline:none;">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $itemList['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $itemList['id'] ?>" >
                                    <?= $itemList['name']; ?>
                                </button>
                                </h2>
                                <div id="collapse<?= $itemList['id'] ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $itemList['id'] ?>" data-bs-parent="#accordionExample">
                                     <div class="accordion-body" style="display:flex;flex-flow:row wrap; justify-content:space-between;">
                                         <div >
                                            <a href="index.php?page=restaurant&resto=<?= $itemList['id_restaurant'] ?>">
                                            <img class="wishImg" src="<?= $itemList['img'] ?>" alt="Alt text" height="100" width="100"/>
                                            </a>
                                        </div>
                                         <div>
                                            <p><strong>From <?= $dataresto['name']; ?>  - <?= $dataresto['city']; ?> </strong></p>
                                            <p>$<?= $itemList['price']; ?> </p>
                                            <a class="btn btn-secondary" href="index.php?page=restaurant&resto=<?= $itemList['id_restaurant'] ?>"
                                                style="border:none;outline:none;background-color:#3cb6c9;color:white;"><?= $dataresto['name']; ?>'s page</a>
                                        </div>
                                        <div>
                                            <div>
                                                <form action="" method="POST">
                                                    <input type='hidden' name='supprWish' value="<?= $itemList['id'];?>">
                                                    <button type="submit" name="submitSupprWish" class="wish" style="border:none;background:transparent;outline:none;">
                                                        <span style="color:black;"><i class="fas fa-heart"></i></span>
                                                    </button> 
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                <!--  promotions  -->
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

                        <?php else :?>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                            

                            <div id="chartContainer" style="height: 250px; width: 100%;"></div>
 
                           

                            <?php
                            //canevas chart
                            $dataPoints = array(
                                array("x"=> 10, "y"=> $numberOfOrders['nombreOrder'], "indexLabel"=> "Number of orders"),
                                array("x"=> 20, "y"=> $numberOfOffers['nombreOffer'], "indexLabel"=> "Number of offers"),
                                array("x"=> 30, "y"=> $numberOfWish['nombreWish'], "indexLabel"=> "Number of wish")
                            );
                            ?>
                            <div style="display:flex; flow-direction: inline;"> 
                            <div id="donutchart" style="width: 600px; height: 400px; margin-top:35px;"></div>
                            <div id="columnchart_material" style="width: 500px; height: 300px; margin-top:75px;"></div>
                            </div>
                    <?php endif; ?>
                    </div>
            </div>
        </div>
       

        <!-- end preview  -->
</div>
</div>

<?php include_once '_includes/footer.php'; ?> 
<script>

function myFunction() {
  var x = document.getElementById("myButton");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

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



<script>
    //script canevas chart
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Dashboard"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['JOUR', 'Nombre'],
          ['Mon',     11],
          ['Tue',      2],
          ['Wed',      2],
          ['Thu',      2],
          ['Fri',      7],
        ]);

        var options = {
          title: 'Most Popular Days',
          pieHole: 0.4,
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
</script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Hour', 'Times'],
          ['11am', 3],
          ['12am', 6],
          ['1pm', 4],
          ['6pm', 2],
          ['7pm', 5],
          ['8pm', 8]
        ]);

        var options = {
          chart: {
            title: 'Most popular time',
            
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>
</body>
</html>