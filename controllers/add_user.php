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

if(isset($_POST["username"]) && isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["confirmed_mdp"])){
    $login = htmlspecialchars($_POST["username"]);
    $mail = htmlspecialchars($_POST["mail"]);
    $password = htmlspecialchars($_POST["mdp"]);
    $confirmed_password = htmlspecialchars($_POST["confirmed_mdp"]);    

    if(getUserByLogin($login)){
        $_SESSION["errorAddAdmin"] = "Nom d'utilisateur déjà utilisé"; 
        header("Location: ".ROOT_PATH."add_user");
        exit();
    }
    else if(getUserByMail($mail)){
        $_SESSION["errorAddAdmin"] = "Adresse e-mail déjà utilisée"; 
        header("Location: ".ROOT_PATH."add_user");
        exit();
    }
    else if($password == $confirmed_password){
        if($_POST["newAdmin"] == "admin"){
            addAdmin($login, $password, $mail);
        }
        else{
            addUser($login, $password, $mail);
        }
        header("Location: ".ROOT_PATH);
        exit();
    }
    else{
        $_SESSION["errorAddAdmin"] = "Les mots de passe ne sont pas identiques";
        header("Location: ".ROOT_PATH."add_user"); 
        exit();
    }
}

$content = "add_user";
render(compact("register", "content", "nav"));
exit();

?>