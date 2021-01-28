<?php
class Order {

    public function getDishesOrder($id, $orderId){
        global $db;

        $client = $db->prepare('
        SELECT D.*, O.total_price, O.date_order, O.id
        FROM dishes AS D, orders AS O, order_item AS OI, customer AS C
        WHERE OI.dish_id = D.id
        AND OI.order_id = O.id
        AND C.id = O.id_customer
        AND C.id = ?
        AND O.id = ?');

        $client->execute(array($id, $orderId));
        $reqClient = $client->fetchAll(PDO::FETCH_ASSOC);
        return $reqClient;
    }


    public function getOrder($id) {
        global $db;

        $client = $db->prepare('
        SELECT * FROM orders AS O
        WHERE id_customer = ? ');

        $client->execute(array($id));
        $reqClient = $client->fetchAll(PDO::FETCH_ASSOC);
        return $reqClient;

    }
  

}