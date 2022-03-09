<?php

include_once("app/config.php");

function getDB(){
    global $db_url, $db_login, $db_pass;
    $bdd = new PDO($db_url, $db_login, $db_pass);
    return $bdd;
}

?>