<?php

include("app/controllers.php");
include_once("models/products.php");

$nav = "nav";
if(empty($_SESSION["login"])){
    $_SESSION["isAdmin"] = false;
    $register = "login_signup";
}
else{
    $register = "user_board";
}

if(REQ_TYPE_ID){
    $content = "cart";
    render(compact("register", "content", "nav"));
    exit();
}
else{
    if(isset($_POST["product_id"], $_POST["quantite"]) && is_numeric($_POST["product_id"]) && is_numeric($_POST["quantite"])){
        $product_id = $_POST["product_id"];
        $quantite = $_POST["quantite"];

        $product = getProductById($product_id);
        if($product && $quantite > 0){
            $content = "cart";
            render(compact("register", "content", "nav"));
            exit();
        }
        else{
            $_SESSION["error"] = "Aucune quantité selectionnée";
            header("Location: ".ROOT_PATH."products");
            exit();
        }
    }
}

?>