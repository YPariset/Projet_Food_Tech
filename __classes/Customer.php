<?php
class Customer {

    /*
    * recupere toutes les informations clients en BDD
    *
    * @param string $mail
    *
    * @return array
    */
    public function getDatasClient($email){
        global $db;

        $client = $db->prepare('
            SELECT * FROM customer WHERE email = ?');
        $client->execute(array($email));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }

    public function getDatasPoints($id){
        global $db;

        $client = $db->prepare('
            SELECT foodies FROM customer
            WHERE id = ?');
        $client->execute(array($id));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }

    /*
    * recupere toutes les informationsclients
    *
    * @param string $name
    *
    * @return array
    */
    public function getDatasClientById($id){
        global $db;

        $client = $db->prepare('
            SELECT * FROM customer WHERE id = ?');
        $client->execute(array($id));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }
    

    /*
    * crée un client en base de donnée
    *
    * @param string $firstname, string $lastname, string $email, string $password
    *
    * @return void
    */
    public function createClient($firstname, $lastname, $username, $email, $password, $street, $zip, $city, $birthday, $dateCreation, $avatar, $foodie){
        global $db;
           $req= 'INSERT INTO customer(firstname, lastname, username, email,  password, street, zip, city, birthday, dateCreation, avatar, foodies) 
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
             $newClient = $db->prepare($req);
        $newClient->execute(array($firstname, $lastname, $username, $email, $password, $street, $zip, $city, $birthday, $dateCreation, $avatar, $foodie));
    }

    
    /*
    * compare des infos de login avec des datas en BDD
    *
    * @param string $mail, string $pass
    *
    * @return boolean
    */
    public function checkDatasLogin($mail, $pass){
        global $db;

        $reqDatas = $db->prepare('
            SELECT * FROM customer
            WHERE email = ?
            AND password = ?
        ');
        $reqDatas->execute(array($mail, $pass));
        $datasExist = $reqDatas->rowCount();
        return $datasExist;
    }


    /*
    * compare une rentrée utilisateur avec une data BDD
    *
    * @param string $maiol
    *
    * @return boolean
    */
    public function VerifyMailAvailable($mail){
        global $db;

        $reqDatas = $db->prepare('
            SELECT * FROM customer
            WHERE email = ? ');
            
        $reqDatas->execute(array($mail));
        $categoryExist = $reqDatas->rowCount(); //renvoi booleen
        return $categoryExist;
    }

    public function VerifyUsernameAvailable($username){
        global $db;

        $reqData = $db->prepare('
            SELECT * FROM customer
            WHERE username = ? ');

        $reqData->execute(array($username));
        $categoryExist = $reqData->rowCount();
        return $categoryExist;
    }

    // Ajout du restaurant dans la wishList
    public function createWishItem($id, $id_dish, $id_wishlist){
        global $db;

        $req = 'INSERT INTO wishlist_item (id, id_dish, id_wishlist) VALUES (?, ?, ?)';

        $newWish = $db->prepare($req);
        $newWish->execute(array($id, $id_dish, $id_wishlist));
    }


    //get wishlist
    public function getWishList($id){
        global $db;
        $client = $db->prepare('
        SELECT D.name, D.price,D.img,D.id, D.id_restaurant
        From dishes as D, customer as C, wishlist_item as W 
        where D.id = W.id_dish 
        AND  W.id_customer = C.id
        ANd C.id = ?;');
         $client->execute(array($id));
         $reqClient = $client->fetchAll(PDO::FETCH_ASSOC);
        return $reqClient;
    }
    public function getDiscountt($id){
        global $db;
        $client = $db->prepare('
        SELECT * FROM discount AS D, customer AS C
        WHERE D.id_customer = C.id
        AND C.id = ?');
        $client->execute(array($id));
         $reqClient = $client->fetchAll(PDO::FETCH_ASSOC);
        return $reqClient;
    }
 
    /*
    * cmodifie les informations de compte client
    *
    * @param string $prenom, string $nom, string $email, string $session
    *
    * @return void
    */
    public function updateClientDatas($prenom, $nom, $email, $username, $street, $zip, $city, $session){
        global $db;
        $update = $db->prepare('UPDATE customer 
        SET firstname = :prenom,
        lastname = :nom,
        email = :email, 
        username = :username,
        street = :street,
        zip = :zip,
        city = :city
        WHERE id = :session');
        $update->execute(array(':prenom' => $prenom, 
        ':nom' => $nom, 
        ':email' => $email, 
        ':username' => $username, 
        ':street' => $street, 
        ':zip' => $zip, 
        ':city' => $city, 
        ':session' => $session));
    }

    /*
    * supprime un compte client
    *
    * @param string string $session
    *
    * @return void
    */
    public function deleteAccount($session){
        global $db;

        $reqDatas = $db->prepare('
        DELETE FROM customer
        WHERE email = ?
    ');
    $reqDatas->execute(array($session));

    }

    

    //wishlist
    public function addToFavorite($idDish, $isCustomer){
        global $db;
            $req= 'INSERT INTO wishlist_item(id_dish, id_customer) VALUES (?, ?)';
             $newClient = $db->prepare($req);
            $newClient->execute(array($idDish, $isCustomer));
            
    }
    public function isWishListed($id){
        $req= 'SELECT * FROM wishlist_item AS W, customer AS C 
                WHERE W.id_customer = C.id
                AND C.id = ?';
        $newClient = $db->prepare($req);
        $newClient->execute(array($id));
        $isWish = $newClient->rowCount();
        return $isWish;
    }

    //requete search bar
   
    public function searchBarre($search){
        global $db;
               $req = $db->prepare('SELECT DISTINCT (D.name), D.img, R.id, D.description
               FROM dishes as D, restaurants as R where R.id=D.id_restaurant AND D.name LIKE ? '); // a ajouter
               $req->execute(array('%' .$search. '%'));
                  $requete = $req->fetchAll(PDO::FETCH_ASSOC);

                  return $requete;
    }

    public function deleteWishItem($id, $idDish){
        global $db;

        $reqData = $db->prepare ('DELETE FROM wishlist_item WHERE id_customer = ? AND id_dish = ?');

        $reqData->execute(array($id, $idDish));
    }

    // insertion produit dans wishlist
    function insertItemFromWishList($id_dish, $item){
        global $db;
        $result = $db->prepare("INSERT INTO wishlist_item(id_dish, id_customer) VALUES(?, ?)");
        $result->execute(array($id_dish, $item));
        
    }

    public function isWishList($id, $idDish){
        global $db;
        $result = $db->prepare("SELECT * FROM wishlist_item as W, customer AS C WHERE W.id_customer=C.id AND C.id = ? AND W.id_dish = ?");
        $result->execute(array($id, $idDish));
        $req = $result->rowCount();
        
        return $req;
    }
    
}