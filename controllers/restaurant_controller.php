<?php
session_start();

$resto = new Food();
    $datadejuste1rest = $resto->getRestaurantById($_GET['page'] );
    $restaurantsOrganic = $resto->getRestaurantOrganic($_GET['page'] );
    $restaurantsGastro = $resto->getRestaurantGastro($_GET['page'] );
    $restaurantsVegan = $resto->getRestaurantVegan($_GET['page'] );
    $restaurantsFastFood = $resto->getFastFoodResto($_GET['page'] );
    $Pizzarestaurants = $resto->getPizzaRestaurant($_GET['page'] );
    $saladesRestaurants = $resto->getSaladRestaurant($_GET['page']);
    $specialityRestaurants = $resto->getSpecialityResto($_GET['page']);
    $tacosRestaurants = $resto->getTacosRestaurant($_GET['page']);
    $meatRestaurants = $resto->getMeatRestaurant($_GET['page']);
    $pastasRestaurants = $resto->getPastaRestaurant($_GET['page']);
    $dessertsRestaurants = $resto->getDessertRestaurant($_GET['page']);
    $restaurantsTradi = $resto->getRestaurantTradi($_GET['page']);

if(isset($_GET['resto']))
{
    $resto = new Food();
    $datasResto = $resto->getSaltyByrestaurantId($_GET['resto']);
    $dataresto2 = $resto->getSweetByrestaurantId($_GET['resto']);
    $datadejuste1rest = $resto->getRestaurantById($_GET['resto'] );

    if(isset($_POST['cartButton'])){
        if(!empty($_POST['qteCart'])){
            $qte = $_POST['qteCart'];
            $nomItem = $_POST['nomItem'];
            $prixItem = $_POST['unitPrice'];

            $cart =new ShoppingCart();
            $cart->addToCart($nomItem, $qte, $prixItem);  
           // var_dump($_SESSION['panier']);
        }else{
            echo 'il n\'y a pas de donnée';
        }
    }
    
}




