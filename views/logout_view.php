<!DOCTYPE html>
<html lang="en">
<head>
     <?php include_once '_includes/head.php'; ?>  
	<title><?= ucFirst($page); ?> - site MVC</title>
</head>
<body>

<div class="cadre">
    
    <script type="text/javascript">
        var count = 5; // Timer
        var redirect = "index.php?page=home"; // Target URL
      
        function countDown() {
          var timer = document.getElementById("timer"); // Timer ID
          if (count > 0) {
            count--;
            timer.innerHTML = "You will be redirected to the home page in " + count + " seconds."; 
            setTimeout("countDown()", 1000);
          } else {
            window.location.href = redirect;
          }
        }
    </script>

    <div id="master-wrap">
        <div id="logo-box">
        <div class="logo"><img class="logoConf" src="./_assets/image/Logo_gris.png" width="120" height="auto" alt="logo feeling food"></div>
        
        <div class="notice animated fadeInUp">
            <p style="font-size:1.5em;" class="lead">You are now disconnected</p>
          </div>
          <div class="animated fast fadeInUp">
            <div class="icon"></div>
                <div class="logo">
                <h1 class="merci">Thank you for your visit ! </h1>
                     <div class="titleSpanColor"><span class="feelin">Feelin</span><span class="food">Food<span class="point">.</span><span class="com">com</span></div>
                </div>
          </div>
      
          
      
          <div class="footer animated slow fadeInUp">
            <p id="timer">
              <script type="text/javascript">
                countDown();
              </script>
            </p>
          </div>

</div>
</body>
</html>