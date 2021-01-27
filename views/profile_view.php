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
    <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="panel rounded shadow">
            <div class="panel-card">
                    <ul class=infoPanel>
                        <li><img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="John Doe"></li>
                        <li class="text-center"><h4 class="text-capitalize">John Doe</h4><p class="text-muted text-capitalize">web designer</p></li>
                        <li><a href="" class="btn btn-success text-center btn-block">PRO Account</a></li>
                        <li><br></li>
                        <li>
                            <div class="btn-group-vertical btn-block">
                                <a href="" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Edit Account</a>
                                <a href="" class="btn btn-default"><i class="fa fa-sign-out pull-right"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
        </div><!-- /.panel -->
</div>

<?php include_once '_includes/footer.php'; ?> 
</body>
</html>