<?php
class Order {

    public function getDishesOrder($id){
        global $db;

        $client = $db->prepare('
        SELECT D.name, D.description, D.price, O.total_price, O.date_order
        FROM dishes AS D, orders AS O, order_item AS OI, customer AS C
        WHERE OI.dish_id = D.id
        AND O.id = OI.id
        AND C.id = O.id_customer');

        $client->execute(array($id));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }

  

}