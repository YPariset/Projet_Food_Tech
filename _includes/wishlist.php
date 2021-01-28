<?php

if(isset($_GET['itemWish'])) {  
    $countItems = countItem($_SESSION['id'], $_GET['idProduct']);
    
    if($countItems['items'] == 1){
        deleteItemFromWishList($_SESSION['id'], $_GET['idProduct']);
    } else {
        insertItemFromWishList($_SESSION['id'], $_GET['idProduct']);
    }
}

function countItem($id, $john){
    global $db;
    $result = $db->prepare("SELECT count(id_dish) AS 'items' FROM wishlist_item 
                            WHERE id_customer = ? 
                            AND id_dish = ?");
    $result->execute(array($id, $john));
    $count = $result->fetch();
    return $count;
}
function deleteItemFromWishList($id, $item){
    global $db;
    $result = $db->prepare("DELETE FROM wishlist_item 
                            WHERE id_dish = ? 
                            AND id_customer = ?");
    $result->execute($id, $item);
}
function insertItemFromWishList($id, $item){
    global $db;
    $result = $db->prepare("INSERT INTO wishlist_item 
                            SET id_dish = ?,
                            id_customer = ?");
    $result->execute($id, $item);
}