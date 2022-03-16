<?php

include("app/controllers.php");
include_once("models/products.php");
include_once("models/order.php");
include_once("models/users.php");

$nav = "nav";
if(empty($_SESSION["login"])){
    $_SESSION["isAdmin"] = false;
    $register = "login_signup";
}
else{
    $register = "user_board";
}

$content = "stats";
render(compact("register", "content", "nav"));
exit();



/*

$best_selling_products = productsStats();

foreach($best_selling_products as $data){
    $title[] = $data["title"];
    $totQuantite[] = $data["totQuantite"];
}
*/

?>

