<?php

include_once("models/db.php");

function getBookIdByUser($user_id){
    $reponse = getDB()->prepare("SELECT MAX(id) as id FROM book WHERE user_id = :user_id");
    $reponse->execute([":user_id" => $user_id]);
    $order_id = $reponse->fetch(PDO::FETCH_ASSOC);
    $reponse->closeCursor();
    return $order_id;
}

function newOrder($user_id){
    $reponse = getDB()->prepare("INSERT INTO book(user_id, status_id) VALUES (:user_id, '1')");
    $reponse->execute([":user_id" => $user_id]);
    $reponse->closeCursor();
}

function userIdToBookId($quantite, $order_id ,$product_id, $product_price){
    $reponse = getDB()->prepare("INSERT INTO book_item(book_id, item_id, price, quantite) VALUES (:order_id, :product_id, :product_price, :quantite)");
    $reponse->execute([":order_id" => $order_id, ":product_id" => $product_id, ":product_price" => $product_price, ":quantite" => $quantite]);
    $reponse->closeCursor();
}

?>