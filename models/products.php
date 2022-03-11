<?php

include_once("models/db.php");

function getProductByTitle($title){
    $reponse = getDB()->prepare("SELECT * FROM products WHERE title = :title");
    $reponse->execute([":title" => $title]);
    $product = $reponse->fetch();
    $reponse->closeCursor();
    return $product;
}

function getProductById($id){
    $reponse = getDB()->prepare("SELECT * FROM products WHERE id = :id");
    $reponse->execute([":id" => $id]);
    $product = $reponse->fetch();
    $reponse->closeCursor();
    return $product;
}

function addProduct($title, $descr, $price, $img, $detailed_descr){
    $reponse = getDB()->prepare("INSERT INTO products(title, descr, img, price, detailed_descr) VALUES (:title, :descr, :img, :price, :detailed_descr)");
    $reponse->execute([":title" => $title, ":descr" => $descr, ":img" => $img, ":price" => $price, ":detailed_descr" => $detailed_descr]);
    $reponse->closeCursor();
}

function getProducts(){
    $reponse = getDB()->prepare("SELECT * FROM products");
    $reponse->execute();
    $products = $reponse->fetchAll();
    $reponse->closeCursor();
    return $products;
}

function deleteProductByTitle($title){
    $reponse = getDB()->prepare("DELETE FROM products WHERE title = :title");
    $reponse->execute([":title" => $title]);
    $reponse->closeCursor();
}

function setProduct($id, $title, $descr, $img, $price, $detailed_descr){
    $reponse = getDB()->prepare("UPDATE products SET title = :title, descr = :descr, img = :img, price = :price, detailed_descr = :detailed_descr WHERE id = :id");
    $reponse->execute([":id" => $id, ":title" => $title, ":descr" => $descr, ":img" => $img, ":price" => $price, ":detailed_descr" => $detailed_descr]);
    $reponse->closeCursor();
}

function productInCart($array_to_question_marks, $produits_in_panier){
    $reponse = getDB()->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
	$reponse->execute(array_keys($produits_in_panier));  
	$produits = $reponse->fetchAll(PDO::FETCH_ASSOC);
    $reponse->closeCursor(); 
    return $produits;
}

?>