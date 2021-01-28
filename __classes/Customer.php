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
            SELECT * FROM awards AS A,
            customer AS C
            WHERE A.id_customer = C.id
            AND C.id = ?');
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
    public function createClient($firstname, $lastname, $username, $email, $password, $street, $zip, $city, $birthday, $dateCreation){
        global $db;
           $req= " INSERT INTO customer(firstname, lastname, username, email,  password, street, zip, city, birthday, dateCreation) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
             $newClient = $db->prepare($req);
        $newClient->execute(array($firstname, $lastname, $username, $email, $password, $street, $zip, $city, $birthday, $dateCreation));
       
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
}