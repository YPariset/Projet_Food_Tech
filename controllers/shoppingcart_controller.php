<?php
session_start();
$_SESSION['panierMontant'] = array();
$getFood = new Food();


$shopCart = new ShoppingCart();
$totalAmount = $shopCart->montant_panier();
$_SESSION['panierMontant'] = number_format($totalAmount,2);

$tax = number_format(($_SESSION['panierMontant'] * 5 ) / 100, 2);

if(isset($_POST['qteValid'])){
    if(!empty($_POST['qte'])){
        $shopCart->changeQuantity($_POST['name'], $_POST['qte']);
    }
}
if(isset($_POST['remove'])){
    $nameToDelete = $_POST['nameDelete'];  
    $shopCart-> removeFromCart($nameToDelete);
    header('Location:index.php?page=shoppingCart');
}

if(isset($_POST['validCoupon'])){
    if(!empty($_POST['coupon'])){
        $coupon = $db->prepare("SELECT * FROM discount as D, customer as C
                                WHERE D.id_customer = C.id
                                AND D.name = ?
                                AND C.id = ? ");
        $coupon->execute(array($_POST['coupon'], $_SESSION['id']));
        $data = $coupon->rowCount();
        if($data == 1 ){
            $dataCoupon = $coupon->fetch(PDO::FETCH_ASSOC);
            $_SESSION['panierMontant'] += $dataCoupon['amount'];
        }
    }else{
        echo 'Please enter a coupon!';
    }
}


