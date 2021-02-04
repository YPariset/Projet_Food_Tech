<?php
session_start();

//search bar
if(isset($_POST['headerSearchSubmit'])){
    if(!empty($_POST['headerSearch'])){
$searchReq = new Customer();
$search = strtolower(trim($_POST['headerSearch']));
$searchBanniere = $searchReq->searchBarre($search); 
$countResultSearch = count($searchBanniere);
        if (count($searchBanniere) == 0){
            $messageSearchFood = "Sorry we dont have this kind of food yet, but we work on it";
        } else {
            $messageSearchFood = "We found " . $countResultSearch . "results for " . $_POST['headerSearch'];
        }

    }
}

$resto = new Food();
    $datadejuste1rest = $resto->getRestaurantById($_GET['page'] );
    $restaurantsOrganic = $resto->getRestaurantOrganic($_GET['page'] );
    $restaurantsGastro = $resto->getRestaurantGastro($_GET['page'] );
    $restaurantsVegan = $resto->getRestaurantVegan($_GET['page'] );
    $restaurantsFastFood = $resto->getFastFoodResto($_GET['page'] );
    $Pizzarestaurants = $resto->getPizzaRestaurant();
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
    $infosRestaurant = $resto->getInfosRestaurant($_GET['resto']);

    if(isset($_POST['cartButton'])){
        if(!empty($_POST['qteCart'])){
            $qte = $_POST['qteCart'];
            $nomItem = $_POST['nomItem'];
            $prixItem = $_POST['unitPrice'];

            $cart =new ShoppingCart();
            $cart->addToCart($nomItem, $qte, $prixItem);  
        }else{
            echo 'il n\'y a pas de donnée';
        }
    }
    
}

if(isset($_POST['submitWishlist'])){                                             
    $addWishList = new Customer();
    $isList = $addWishList->isWishList($_SESSION['id'], $_POST['addWishList']);
if($isList > 0){
    $addWishList->deleteWishItem($_SESSION['id'], $_POST['addWishList']);
}else{
    $addWishList->insertItemFromWishList($_POST['addWishList'], $_SESSION['id']);
    
}
}




