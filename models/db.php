<?php

function getDB(){
    $bdd = new PDO("mysql:host=localhost:3307;dbname=monprojet;charset=utf8", "root", "");
    return $bdd;
}

?>