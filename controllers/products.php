<?php

include("app/controllers.php");

$content = "products";
$nav = "nav";

if(empty($_SESSION["login"])){
    $register = "login_signup";
}
else{
    $register = "user_board";
}

?>