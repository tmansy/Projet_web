<?php

function getDB(){
    $bdd = new PDO("mysql:host=localhost:3307;dbname=monprojet;charset=utf8", "root", "");
    return $bdd;
}

function getUserByLogin($login){
    $reponse = getDB()->prepare("SELECT * FROM users WHERE login = :login");
    $reponse->execute([":login" => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

function getUserByMail($mail){
    $reponse = getDB()->prepare("SELECT * FROM users WHERE mail = :mail");
    $reponse->execute([":mail" => $mail]);
    $user = $reponse->fetch();
    $reponse->closeCursor();
    return $user;
}

function addUser($login, $password, $mail){
    $reponse = getDB()->prepare("INSERT INTO users(login, password, mail, type) VALUES (:login, :password, :mail, 'user')");
    $password = password_hash($password, PASSWORD_DEFAULT);
    $reponse->execute([":password" => $password, ":login" => $login, "mail" => $mail]);
    $reponse->closeCursor();
}

function getProductbyTitle($title){
    $reponse = getDB()->prepare("SELECT * FROM products WHERE title = :title");
    $reponse->execute([":title" => $title]);
    $product = $reponse->fetch();
    $reponse->closeCursor();
    return $product;
}

function addProduct($title, $descr, $price){
    $reponse = getDB()->prepare("INSERT INTO products(title, descr, price) VALUES (:title, :descr, :price)");
    $reponse->execute([":title" => $title, ":descr" => $descr, ":price" => $price]);
    $reponse->closeCursor();
}

?>