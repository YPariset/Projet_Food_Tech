<!-- <!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Your order will arrived soon, enjoy your meal </title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
    <h1>Thank you for your order, see you soon </h1> 
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
    <!-- Header du mail -->
    <head>
        <meta charset="utf-8">
        <?php include_once '_includes/head.php'; ?>  
        <title><?= ucFirst($page); ?> - Feeling Food </title>
    </head>

    
    <body>
    <!-- Corps du mail -->
    <?php include_once '_includes/header.php'; ?> 
    <main>
        <div class="textMail">
            <h2>Thank you for your order <?=$_SESSION['username']; ?></h2>  
            <h3>It will arrived soon as possible</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Ratione sunt eum labore commodi fuga omnis, 
                    molestias sapiente, accusamus eveniet consectetur 
                    necessitatibus.
                </p>
        </div>
    </main>
    <!-- Footer -->
    <?php include_once '_includes/footer.php'; ?> 
    </body>
</footer>