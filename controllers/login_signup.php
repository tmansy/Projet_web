<?php

require("models/users.php");
include("views/login_signup.php");

if(isset($_POST["login_inscription"]) && isset($_POST["password_inscription"]) && isset($_POST["password_verify_inscription"]) && isset($_POST["mail_inscription"])){
    if(getUserByLogin($_POST["login_inscription"])){
        $error_message = "Nom d'utilisateur déjà utilisé";
    }
    else if(getUserByMail($_POST["mail_inscription"])){
        $error_message = "Adresse e-mail déjà utilisée";
    }
    else if($_POST["password_inscription"] == $_POST["password_verify_inscription"]){
        $_SESSION["login"] = $_POST["login_inscription"];
        addUser($_POST["login_inscription"], $_POST["password_inscription"], $_POST["mail_inscription"]);
        header("Location: ".ROOT_PATH);
        exit();
    }
    else{
        $error_message = "Les mots de passe ne sont pas identiques";
    }
}

if(isset($_POST["login_connexion"]) && isset($_POST["password_connexion"])){
    $user = getUserByLogin($_POST["login_connexion"]);
    if($user && password_verify($_POST["password_connexion"], $user["password"])){
        $_SESSION["login"] = $_POST["login_connexion"];
        header("Location: ".ROOT_PATH);
        exit();
    }
    else{
        $error_message = "Nom d'utilisateur ou mot de passe incorrect";   
    }
}

?>