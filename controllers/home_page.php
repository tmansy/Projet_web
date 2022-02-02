<?php

if(empty($_SESSION["login"])){
    include("controllers/login_signup.php");
}
else{
}

include("views/home_page.php");

?>