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

if(REQ_TYPE_ID){
    if(REQ_ACTION == "confirm"){
        confirmedBook(REQ_TYPE_ID);
        header("Location: ".ROOT_PATH."order_confirmation");
        exit();
    }
    if(REQ_ACTION == "delete"){
        deleteBook(REQ_TYPE_ID);
        header("Location: ".ROOT_PATH."order_confirmation");
        exit();
    }
}

$content = "order_confirmation";
render(compact("register", "content", "nav"));
exit();

?>