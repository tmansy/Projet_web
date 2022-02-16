<?php

if(empty($_SESSION["login"])){
    include("views/login_signup.php");
}
else{
    include("views/user_board.php");
}

include("views/products.php");

?>