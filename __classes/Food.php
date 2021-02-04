<?php
class Food{

    public function gettheDishByname($name){
        global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes WHERE name = ?');
        $prod->execute(array($name));
        $data = $prod->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getProductByrestaurantId($id){
        global $db;

        $prod = $db->prepare('
            SELECT D.* FROM dishes AS D, restaurants AS R
             WHERE D.id_restaurant = R.id
             AND R.id = ?');
        $prod->execute(array($id));
        $data = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getSaltyByrestaurantId($id){
        global $db;

        $prod = $db->prepare('
            SELECT D.* 
            FROM dishes AS D, restaurants AS R
             WHERE D.id_restaurant = R.id
             AND R.id = ?
             AND D.dish_category <> "Dessert"');
        $prod->execute(array($id));
        $data = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getSweetByrestaurantId($id){
        global $db;

        $prod = $db->prepare('
            SELECT D.* FROM dishes AS D, restaurants AS R
             WHERE D.id_restaurant = R.id
             AND R.id = ?
             AND D.dish_category = "Dessert"');
        $prod->execute(array($id));
        $data = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getRestaurant($id){
        global $db;

        $prod = $db->prepare('
            SELECT * FROM restaurants WHERE id = ?');
        $prod->execute(array($id));
        $get = $prod->fetch(PDO::FETCH_ASSOC);
        return $get;
    }

    public function getRestaurantById($id){
        global $db;

        $prod = $db->prepare('
            SELECT * FROM restaurants WHERE id = ?');
        $prod->execute(array($id));
        $get = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $get;
    }

    // Restaurants traditionnels
    public function getRestaurantTradi($id){
        global $db;
        $traditional = $db->prepare('   SELECT R.img, R.name, R.id
                                        FROM restaurants as R, dishes AS D
                                        WHERE D.food_category = "Traditionnel"
                                            AND D.id_restaurant = R.id');
        $traditional->execute();
        $restaurantsTradi = $traditional->fetchAll(PDO::FETCH_ASSOC);
        return $restaurantsTradi;
    }

    // Organic restaurants
    public function getRestaurantOrganic($id){
        global $db;
        $organic = $db->prepare('   SELECT R.img, R.name, R.id
                                        FROM restaurants as R, dishes AS D
                                        WHERE D.food_category = "Organic"
                                            AND D.id_restaurant = R.id');
        $organic->execute();
        $restaurantsOrganic = $organic->fetchAll(PDO::FETCH_ASSOC);
        return $restaurantsOrganic;
    }

    // Restaurants gastronomiques 
    public function getRestaurantGastro($id){
        global $db;
        $gastro = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.food_category = "Gastronomic"
                                    AND D.id_restaurant = R.id');
        $gastro->execute();
        $restaurantsGastro = $gastro->fetchAll(PDO::FETCH_ASSOC);
        return $restaurantsGastro;
    }

    // Restaurants Vegan
    public function getRestaurantVegan($id){
        global $db;
        $vegan = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.food_category = "Vegan"
                                    AND D.id_restaurant = R.id');
        $vegan->execute();
        $restaurantsVegan = $vegan->fetchAll(PDO::FETCH_ASSOC);
        return $restaurantsVegan;
    }

    // Fast Food
    public function getFastFoodResto($id){
        global $db;
        $fastFood = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.food_category = "Fast"
                                    AND D.id_restaurant = R.id');
        $fastFood->execute();
        $restaurantsFastFood = $fastFood->fetchAll(PDO::FETCH_ASSOC);
        return $restaurantsFastFood;
    }

    // Pizza restaurants
    public function getPizzaRestaurant(){
        global $db;
        $pizza = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.dish_category = "Pizza"
                                    AND D.id_restaurant = R.id');
        $pizza->execute();
        $Pizzarestaurants = $pizza->fetchAll(PDO::FETCH_ASSOC);
        return $Pizzarestaurants;
    }

    // Salades restaurants
    public function getSaladRestaurant($id){
        global $db;
        $salades = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.dish_category = "Salade"
                                    AND D.id_restaurant = R.id');
        $salades->execute();
        $saladesRestaurants = $salades->fetchAll(PDO::FETCH_ASSOC);
        return $saladesRestaurants;
    }

    // Speciality
    public function getSpecialityResto($id){
        global $db;
        $speciality = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.dish_category = "Spécialités"
                                    AND D.id_restaurant = R.id');
        $speciality->execute();
        $specialityRestaurants = $speciality->fetchAll(PDO::FETCH_ASSOC);
        return $specialityRestaurants;
    }
    
    // Tacos
    public function getTacosRestaurant($id){
        global $db;
        $tacos = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.dish_category = "Tacos"
                                    AND D.id_restaurant = R.id');
        $tacos->execute();
        $tacosRestaurants = $tacos->fetchAll(PDO::FETCH_ASSOC);
        return  $tacosRestaurants;
    }

    // Meat Restaurant
    public function getMeatRestaurant($id){
        global $db;
        $meat = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.dish_category = "Meat"
                                    AND D.id_restaurant = R.id');
        $meat->execute();
        $meatRestaurants = $meat->fetchAll(PDO::FETCH_ASSOC);
        return  $meatRestaurants;
    }

    // Pastas
    public function getPastaRestaurant($id){
        global $db;
        $pastas = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.dish_category = "Pizza"
                                    AND D.id_restaurant = R.id');
        $pastas->execute();
        $pastasRestaurants = $pastas->fetchAll(PDO::FETCH_ASSOC);
        return $pastasRestaurants;
    }

    // Desserts
    public function getDessertRestaurant($id){
        global $db;
        $desserts = $db->prepare('   SELECT R.img, R.name, R.id
                                FROM restaurants as R, dishes AS D
                                WHERE D.dish_category = "Dessert"
                                    AND D.id_restaurant = R.id');
        $desserts->execute();
        $dessertsRestaurants = $desserts->fetchAll(PDO::FETCH_ASSOC);
        return $dessertsRestaurants;
    }

	
	/***************** food categorie *****************/
	public function DisplayProdFoodCatogories(){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, food_category AS F
            WHERE D.food_category = F.name');
        $prod->execute();
        $get = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $get;
	}
	
	public function getFoodByCatogories($nameUrl){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, food_category AS F
            WHERE D.food_category = F.name
            And F.name = ?');
        $prod->execute(array($nameUrl));
        $get = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $get;
	}
	
	
	/***************** dish categorie *****************/
	public function DisplayProdDishCatogories(){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, dish_category AS DC
            WHERE D.dish_category = DC.name');
        $prod->execute();
        $get = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $get;
	}
	
	public function getProdByDishCatogories($nameUrl){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, dish_category AS DC
            WHERE D.dish_category = DC.name
            AND DC.name = ?');
        $prod->execute(array($nameUrl));
        $get = $prod->fetchAll(PDO::FETCH_ASSOC);
        return $get;
	}
	

}
	