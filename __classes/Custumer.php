<?php 
class Customer{

      /*
    * recupere toutes les informations clients en BDD
    *
    * @param string $mail
    *
    * @return array
    */
    public function getDatasClient($mail){
        global $db;

        $client = $db->prepare('
            SELECT * FROM client WHERE email = ?');
        $client->execute(array($mail));
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
    public function getDatasClientByName($name){
        global $db;

        $client = $db->prepare('
            SELECT * FROM client WHERE firstname = ?');
        $client->execute(array($name));
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
    public function createClient($firstname, $lastname, $email, $password){
        global $db;
        $newClient = $db->prepare('
            INSERT INTO client(firstname, lastname, email, password) VALUES (?, ?, ?, ?)');
        $newClient->execute(array($firstname, $lastname, $email, $password));
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
            SELECT * FROM client
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
            SELECT * FROM client
            WHERE email = ? ');
            
        $reqDatas->execute(array($mail));
        $categoryExist = $reqDatas->rowCount(); //renvoi booleen
        return $categoryExist;
    }

    public function VerifyUsernameAvailable($username){
        global $db;

        $reqDatas = $db->prepare('
            SELECT * FROM client
            WHERE username = ? ');
            
        $reqDatas->execute(array($mail));
        $categoryExist = $reqDatas->rowCount(); //renvoi booleen
        return $categoryExist;
    }

    
    /*
    * cmodifie les informations de compte client
    *
    * @param string $prenom, string $nom, string $email, string $session
    *
    * @return void
    */
    public function updateClientsDatas($prenom, $nom, $email, $session){
        global $db;
        $update = $db->prepare('
            UPDATE client
            SET firstname = ?,
            lastname = ?,
            email = ?
            WHERE email = ?
            ');
        $update->execute(array($prenom, $nom, $email, $session));
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
        DELETE FROM client
        WHERE email = ?
    ');
    $reqDatas->execute(array($session));

    }
}



