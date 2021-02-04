<?php
class Order {

    public function getDishesOrder($id, $orderId){
        global $db;

        $client = $db->prepare('
        SELECT D.*, O.total_price, O.date_order, O.id, O.number, OI.item_quantity
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


    public function countOrder($id) {
        global $db;

        $client = $db->prepare('SELECT COUNT(*) AS nombreOrder FROM orders WHERE id_customer = ?');

        $client->execute(array($id));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }

    public function countOffers($id) {
        global $db;

        $client = $db->prepare('SELECT COUNT(*) AS nombreOffer FROM discount WHERE id_customer = ?');

        $client->execute(array($id));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }

    public function countWish($id) {
        global $db;

        $client = $db->prepare('SELECT COUNT(*) AS nombreWish FROM wishlist_item WHERE id_customer = ?');

        $client->execute(array($id));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }


    function getTotalAmount($id){
        global $db;
        $total = $db->prepare('
            SELECT sum(item_price * item_quantity)
            FROM order_item as OI, orders as O, customer as C
            WHERE OI.order_id = O.id
            AND O.id_customer = C.id
            ANd c.id : ?');
            $total ->execute(array($id));
            $totalAmount = $total->fetch(PDO::FETCH_ASSOC);
            return $totalAmount;
    }

    public function createOrder($id, $price, $date, $number){
        global $db;
        $insertOrder = $db->prepare('INSERT INTO orders (id_customer, total_price, date_order, number)
                                VALUES (?, ?, ?, ?)');
        $insertOrder->execute(array($id, $price, $date, $number));
    }

    public function selectIdOrderByRef($ref){
        global $db;

        $client = $db->prepare('
        SELECT id FROM orders 
        WHERE number = ? ');
        $client->execute(array($ref));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }
    public function selectIdDishByName($name){
        global $db;

        $client = $db->prepare('
        SELECT id FROM dishes 
        WHERE name = ? ');
        $client->execute(array($name));
        $reqClient = $client->fetch(PDO::FETCH_ASSOC);
        return $reqClient;
    }

    public function createOrderItem($id_order, $quantity, $item_price, $id_dish){
        global $db;
        $insertOrder = $db->prepare('INSERT INTO order_item (order_id, item_quantity, item_price, dish_id)
                                VALUES (?, ?, ?, ?)');
        $insertOrder->execute(array($id_order, $quantity, $item_price, $id_dish));
    }

    public function creditPoints($foodie, $id){
        global $db;
        $update = $db->prepare('UPDATE customer 
        SET foodies = :foodie
        WHERE id = :id');
        $update->execute(array(':foodie' => $foodie, 
        ':id' => $id));

    }
  

}