<?php 

if(empty($_SESSION["login"])){
    include("views/login_signup.php");
}
else{
    include("views/user_board.php");
}

include("views/new_product.php");

if(isset($_POST["title"]) && isset($_POST["descr"]) && isset($_POST["price"])){
    $title = $_POST["title"];
    $descr = $_POST["descr"];
    $price = $_POST["price"];

    if(getProductbyTitle($title)){
        // Erreurs à traiter
        exit();
    }
    else{
        addProduct($title, $descr, $price);
        header("Location: ".ROOT_PATH."products");
    }
}

?>