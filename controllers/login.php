<?php

include_once("models/users.php");

if(isset($_POST["login_connexion"]) && isset($_POST["password_connexion"])){
    $login = htmlspecialchars($_POST["login_connexion"]);
    $password = htmlspecialchars($_POST["password_connexion"]);
    $user = getUserByLogin($_POST["login_connexion"]);

    if($user && password_verify($password, $user["password"])){
        $_SESSION["login"] = $login;
        if($user["type"] == "admin"){
            $_SESSION["isAdmin"] = true;
        }
        else{
            $_SESSION["isAdmin"] = false;
        }
        header("Location: ".ROOT_PATH);
        exit();
    }
    else{
        $_SESSION["error"] = "Nom d'utilisateur ou mot de passe incorrect";   
        header("Location: ".ROOT_PATH);
    }
}

?>