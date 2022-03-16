<?php

include_once("models/db.php");

function getLastBookIdByUser($user_id){
    $reponse = getDB()->prepare("SELECT MAX(id) as id FROM book WHERE user_id = :user_id");
    $reponse->execute([":user_id" => $user_id]);
    $order_id = $reponse->fetch(PDO::FETCH_ASSOC);
    $reponse->closeCursor();
    return $order_id;
}

function getAllBooksByUser($user){
    $reponse = getDB()->prepare("SELECT u.login, b.id AS numCommande, p.title AS nomProduit, bi.price AS prix, bi.quantite AS quantite, s.name AS statut FROM book AS b INNER JOIN users AS u ON b.user_id = u.id INNER JOIN book_item AS bi ON b.id = bi.book_id INNER JOIN products AS p ON bi.item_id = p.id INNER JOIN STATUS AS s ON s.id = b.status_id WHERE u.login = :user ORDER BY numCommande DESC");
    $reponse->execute([":user" => $user]);
    $order = $reponse->fetchAll(PDO::FETCH_ASSOC);
    $reponse->closeCursor();
    return $order;
}

function getAllBooks(){
    $reponse = getDB()->prepare("SELECT u.login, b.id AS numCommande, p.title AS nomProduit, bi.price AS prix, bi.quantite AS quantite, s.name AS statut FROM book AS b INNER JOIN users AS u ON b.user_id = u.id INNER JOIN book_item AS bi ON b.id = bi.book_id INNER JOIN products AS p ON bi.item_id = p.id INNER JOIN STATUS AS s ON s.id = b.status_id ORDER BY numCommande DESC");
    $reponse->execute();
    $order = $reponse->fetchAll(PDO::FETCH_ASSOC);
    $reponse->closeCursor();
    return $order;
}

function getAllUntreatedBooks(){
    $reponse = getDB()->prepare("SELECT u.login, b.id AS numCommande, p.title AS nomProduit, bi.price AS prix, bi.quantite AS quantite, s.name AS statut FROM book AS b INNER JOIN users AS u ON b.user_id = u.id INNER JOIN book_item AS bi ON b.id = bi.book_id INNER JOIN products AS p ON bi.item_id = p.id INNER JOIN STATUS AS s ON s.id = b.status_id WHERE s.name = 'En attente' ORDER BY numCommande DESC");
    $reponse->execute();
    $order = $reponse->fetchAll(PDO::FETCH_ASSOC);
    $reponse->closeCursor();
    return $order;
}

function confirmedBook($idCommande){
    $reponse = getDB()->prepare("UPDATE book SET status_id = 2 WHERE id = :idCommande");
    $reponse->execute([":idCommande" => $idCommande]);
    $reponse->closeCursor();
}

function deleteBook($idCommande){
    $reponse = getDB()->prepare("UPDATE book SET status_id = 3 WHERE id = :idCommande");
    $reponse->execute([":idCommande" => $idCommande]);
    $reponse->closeCursor();
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

function productsStats(){
    $reponse = getDB()->prepare("SELECT p.title as nomProduit, SUM(quantite) as quantiteProduit FROM book_item AS bi INNER JOIN products AS p ON bi.item_id = p.id GROUP BY p.title ORDER BY SUM(quantite) DESC LIMIT 5;");
    $reponse->execute();
    while($ligne = $reponse->fetch(PDO::FETCH_ASSOC)){
        $data[] = $ligne;
    }
    $json_data = json_encode($data);
    $reponse->closeCursor();
    return $json_data;
}

?>