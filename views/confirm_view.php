<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - Feeling Food </title>
</head>


<div class="confirmation">
<div class="logo"><img class="logoConf" src="./_assets/image/Logo_gris.png" width="120" height="auto" alt="logo feeling food"></div>
  <div class="headPage">

  
    <?php if(isset($_GET['load'])) : ?>
    <div class="titreConfirm"><h1>Thank you and enjoy your meal </br><div class="nomClient"><?= $_SESSION['firstname'] ?></div></h1></div>
  </div>
    <p class="orderNumb">Your order number is  :  <span class="orderBack"><?= $_SESSION['number'] ?></span></p>
  <div class="colFoodies">
    <span class="award1"><i class="fas fa-award "></i></span> <p>You have collected  10 foodies!! </p> <span class="award2"><i class="fas fa-award "></i></span>
  </div>
    <div class="buttonBack"><a  href="index.php?page=home&back" class="btn btn-secondary" style="background-color: #3cb6c9;">Back to home</a></div>
<?php else : ?>
    <div id="loader" class="load"></div>
<?php endif; ?>

</div>


  <script>
      function hide(){
        document.getElementById('loader').style.display= "none";
        document.location.href="index.php?page=confirm&load"; 
        

    }
    setTimeout(hide,3000);

</script>


<style>
    #loader{
  zoom:2;/* Increase this for a bigger symbole*/
  
  display:block;
  
  width:25px;
  height:20px;
  
  margin:20px auto;
  
  animation: wait .80s steps(1, start) infinite;
  
  background: linear-gradient(0deg, #f4f5fa 1px, transparent 0, transparent 8px, #f4f5fa 8px),   /* 6  */
              linear-gradient(90deg, #f4f5fa 1px, #f6f9fb 0, #f6f9fb 3px, #f4f5fa 3px),
    
              linear-gradient(0deg, #ececf5 1px, transparent 0, transparent 8px, #ececf5 8px),   /* 5  */
              linear-gradient(90deg, #ececf5 1px, #f2f3f9 0, #f2f3f9 3px, #ececf5 3px),
    
              linear-gradient(0deg, #e7eaf4 1px, transparent 0, transparent 8px, #e7eaf4 8px),   /* 4  */
              linear-gradient(90deg, #e7eaf4 1px, #eef1f8 0, #eef1f8 3px, #e7eaf4 3px),
    
              linear-gradient(0deg, #b9bedd 1px, transparent 0, transparent 10px, #b9bedd 10px), /* 3  */
              linear-gradient(90deg, #b9bedd 1px, #d0d5e8 0, #d0d5e8 3px, #b9bedd 3px),
              
              linear-gradient(0deg, #9fa6d2 1px, transparent 0, transparent 15px, #9fa6d2 15px), /* 2  */
              linear-gradient(90deg, #9fa6d2 1px, #c0c5e1 0, #c0c5e1 3px, #9fa6d2 3px),
              
              linear-gradient(0deg, #8490c6 1px, transparent 0, transparent 15px, #8490c6 15px), /* 1  */
              linear-gradient(90deg, #8490c6 1px, #aeb5da 0, #aeb5da 3px, #8490c6 3px);  
  
  background-repeat: no-repeat;
  
  background-size: 4px 9px,   /* 6 */
                   4px 9px,
    
                   4px 9px,   /* 5 */
                   4px 9px,
    
                   4px 9px,   /* 4 */
                   4px 9px,
    
                   4px 11px,  /* 3 */
                   4px 11px,
    
                   4px 16px,  /* 2 */
                   4px 16px,
    
                   4px 16px,  /* 1 */
                   4px 16px;
  
  background-position:-4px 3px, -4px 3px, -4px 3px, -4px 3px, -4px 3px, -4px 3px, -4px 2px, -4px 2px, -4px 0, -4px 0, -4px 0, -4px 0;
    
  
}

@keyframes wait{
  12.5%{
    background-position:   -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                           -4px,  /* 4 */
                           -4px,
                           
                           -4px,  /* 3 */
                           -4px,
      
                           -4px,  /* 2 */
                           -4px,
      
                              0 ,  /* 1 */
                              0 ;
  }
  25%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                           -4px,  /* 4 */
                           -4px,
                           
                           -4px,  /* 3 */
                           -4px,
      
                              0,  /* 2 */
                              0,
      
                            6px,  /* 1 */
                            6px;
  }
  37.5%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                           -4px,  /* 4 */
                           -4px,
                           
                               0,  /* 3 */
                               0,
      
                             6px,  /* 2 */
                             6px,
      
                            12px,  /* 1 */
                            12px;
  }
  50%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                           -4px,  /* 5 */
                           -4px,
                   
                               0,  /* 4 */
                               0,
                           
                             6px,  /* 3 */
                             6px,
      
                            12px,  /* 2 */
                            12px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  62.5%{
    background-position: -4px,  /* 6 */
                           -4px,
      
                               0,  /* 5 */
                               0,
                   
                             6px,  /* 4 */
                             6px,
                           
                            12px,  /* 3 */
                            12px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  75%{
    background-position:     0,  /* 6 */
                               0,
      
                             6px,  /* 5 */
                             6px,
                   
                            12px,  /* 4 */
                            12px,
                           
                            -4px,  /* 3 */
                            -4px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  87.5%{
    background-position:   6px,  /* 6 */
                             6px,
      
                            12px,  /* 5 */
                            12px,
                   
                            -4px,  /* 4 */
                            -4px,
                           
                            -4px,  /* 3 */
                            -4px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
  100%{
    background-position:    12px,  /* 6 */
                            12px,
      
                            -4px,  /* 5 */
                            -4px,
                   
                            -4px,  /* 4 */
                            -4px,
                           
                            -4px,  /* 3 */
                            -4px,
      
                            -4px,  /* 2 */
                            -4px,
      
                            -4px,  /* 1 */
                            -4px;
  }
}

</style>