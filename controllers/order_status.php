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







$content = "order_status";
render(compact("register", "content", "nav"));
exit();

?>