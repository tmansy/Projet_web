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
    if(isset($_POST["update"]) && isset($_SESSION["cart"])){
        foreach($_POST as $k => $v){
            if(strpos($k, "quantite") !== false && is_numeric($v)){
                $id = str_replace('quantite-', '', $k);   
	            $quantite = (int)$v;
                if(is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantite > 0){   
                    $_SESSION['cart'][$id] = $quantite;   
                }   
            }
        }
    }
    if(isset($_POST["delete"]) && isset($_SESSION["cart"])){
        $id = $_POST["delete"];
        unset($_SESSION["cart"][$id]);
    }
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
            if(isset($_SESSION["cart"]) && is_array($_SESSION["cart"])){
                if(array_key_exists($product_id, $_SESSION["cart"])){
                    $_SESSION["cart"][$product_id] += $quantite;
                    $_SESSION["message"] = "La quantité de l'article a bien été mis à jour dans le panier";
                    header("Location: ".ROOT_PATH."products");
                    exit();
                }
                else{
                    $_SESSION["cart"][$product_id] = $quantite;
                }
            }
            else{
                $_SESSION["cart"] = array($product_id => $quantite);
            }
            $_SESSION["message"] = "Votre article a bien été ajouté au panier";
            header("Location: ".ROOT_PATH."products");
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