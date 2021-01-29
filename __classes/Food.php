<?php
class Food{

	public function getAllProducts(){
		global $db;

        $prod = $db->prepare('SELECT * FROM product');
        $prod->execute();
        $prod = $client->fetchAll(PDO::FETCH_ASSOC);
        return $prod;
	}

	public function getProductById($id){
        global $db;

        $prod = $db->prepare('
            SELECT * FROM product WHERE id = ?');
        $prod->execute(array($id));
        $prod = $client->fetch(PDO::FETCH_ASSOC);
        return $prod;
    }
    public function getRestaurantById($id){
        global $db;

        $prod = $db->prepare('
            SELECT * FROM restaurants WHERE id = ?');
        $prod->execute(array($id));
        $get = $prod->fetch(PDO::FETCH_ASSOC);
        return $get;
    }
    
	
	/***************** food categorie *****************/
	public function DisplayProdFoodCatogories(){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, food_category AS F
            WHERE D.food_category = F.name');
        $prod->execute();
        $prod = $client->fetchAll(PDO::FETCH_ASSOC);
        return $prod;
	}
	
	public function getFoodByCatogories($nameUrl){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, food_category AS F
            WHERE D.food_category = F.name
            And F.name = ?');
        $prod->execute(array($nameUrl));
        $prod = $client->fetchAll(PDO::FETCH_ASSOC);
        return $prod;
	}
	
	
	/***************** dish categorie *****************/
	public function DisplayProdDishCatogories(){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, dish_category AS DC
            WHERE D.dish_category = DC.name');
        $prod->execute();
        $prod = $client->fetchAll(PDO::FETCH_ASSOC);
        return $prod;
	}
	
	public function getProdByDishCatogories($nameUrl){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM dishes as D, dish_category AS DC
            WHERE D.dish_category = DC.name
            AND DC.name = ?');
        $prod->execute(array($nameUrl));
        $prod = $client->fetchAll(PDO::FETCH_ASSOC);
        return $prod;
	}
	
	/***************** product par plat *****************/
	
	public function getProductByDish($idDish){
		global $db;

        $prod = $db->prepare('
            SELECT * FROM product as P, dishes AS D
            WHERE P.id_dish = D.id
            ');
        $prod->execute(array($idDish));
        $prod = $client->fetchAll(PDO::FETCH_ASSOC);
        return $prod;
    }
}
	