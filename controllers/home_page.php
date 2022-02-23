<?php

include("app/controllers.php");

$content = "home_page";
$nav = "nav";

if(empty($_SESSION["login"])){
    $register = "login_signup";
}
else{
    $register = "user_board";
}

render(compact("register", "content", "nav"));

?>