<?php

if(empty($_SESSION["login"])){
    include("views/login_signup.php");
}
else{
}

include("views/home_page.php");

?>