<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>
<body style="height:auto;">
<?php include_once '_includes/header-banner.php'; ?>  

<div class="container_form" style="margin-top:90px;">
<h1 class="mb-1" style="padding-top:60px">Sign Up</h1>
<h2 class="mb-2">Get anything, anytime, anywhere</h2>
<div class="row mt-4">
    <!-- debut form sign in -->
    <div class="col mt-5" style="border :1px solid lightgrey;padding:30px;margin: 50px;">
    <h5 class="mb-5">Please fill in this form to create an account.</h5>
    <?php if(isset($alertSign)){echo $alertSign;} ?>

    <?php Form::startForm('""', 'POST', 'row g-3'); ?>
          <div class="col-md-4">
               <?php Form::createLabel('inputFirstName', 'form-label', 'First name'); ?>
               <?php Form::createField('firstname', 'form-control' , 'text'); ?>
          </div>

          <div class="col-md-4">
               <?php Form::createLabel('inputLastName', 'form-label', 'Last name'); ?>
               <?php Form::createField('lastname', 'form-control' , 'text'); ?>
          </div>
          <div class="col-md-4">
               <?php Form::createLabel('inputUsername', 'form-label', 'username'); ?>
               <?php Form::createField('username', 'form-control' , 'text'); ?>
          </div>
          <div class="col-md-4">
               <?php Form::createLabel('inputMail', 'form-label', 'Email'); ?>
               <?php Form::createField('email', 'form-control' , 'text'); ?>
          </div>
          <div class="col-md-4">
               <?php Form::createLabel('inputPass', 'form-label', 'Password'); ?>
               <?php Form::createField('passSign', 'form-control' , 'password'); ?>
          </div>
               <div class="col-md-4">
               <?php Form::createLabel('inputStreet', 'form-label', 'Street'); ?>
               <?php Form::createField('streetSign', 'form-control' , 'text'); ?>
          </div>
               <div class="col-md-4">
               <?php Form::createLabel('inputZip', 'form-label', 'Zip'); ?>
               <?php Form::createField('zipSign', 'form-control' , 'text'); ?>
          </div>
               <div class="col-md-4">
               <?php Form::createLabel('inputCity', 'form-label', 'City'); ?>
               <?php Form::createField('citySign', 'form-control' , 'text'); ?>
          </div>
               <div class="col-md-4">
               <?php Form::createLabel('inputBirthday', 'form-label', 'Birthday'); ?>
               <?php Form::createField('birthday', 'form-control' , 'date'); ?>
          </div>
            
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="news">
                    <label class="form-check-label" for="gridCheck">Receive the newsletter</label>
                </div>
            </div>
            <div class="col-12" style="padding-top: 20px">
                <?php Form::createSubmit('submit', 'btn btn-primary', 'signup', 'done', 'S\'inscrire'); ?>
            </div>
                <?php Form::endForm(); ?>
          </div>
 <!-- fin form sign in -->


<?php include_once '_includes/footer.php'; ?> 
</body>
</html>