<?php

include_once("models/users.php");

if(isset($_POST["login_inscription"]) && isset($_POST["password_inscription"]) && isset($_POST["password_verify_inscription"]) && isset($_POST["mail_inscription"])){
    $login = htmlspecialchars($_POST["login_inscription"]);
    $password = htmlspecialchars($_POST["password_inscription"]);
    $password_verify = htmlspecialchars($_POST["password_verify_inscription"]);
    $mail = htmlspecialchars($_POST["mail_inscription"]);

    if(getUserByLogin($login)){
        $_SESSION["error"] = "Nom d'utilisateur déjà utilisé"; 
        header("Location: ".ROOT_PATH);
    }
    else if(getUserByMail($mail)){
        $_SESSION["error"] = "Adresse e-mail déjà utilisée"; 
        header("Location: ".ROOT_PATH);
    }
    else if($password == $password_verify){
        $_SESSION["login"] = $login;
        addUser($login, $password, $mail);
        header("Location: ".ROOT_PATH);
        exit();
    }
    else{
        $_SESSION["error"] = "Les mots de passe ne sont pas identiques";
        header("Location: ".ROOT_PATH); 
    }
}

?>