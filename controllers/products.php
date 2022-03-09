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

if(REQ_TYPE_ID){
    $article = str_replace("-", " ", REQ_TYPE_ID);
    $product = getProductByTitle($article);
    if(REQ_ACTION == "edit"){
        if(!empty($_POST)){
            $taillemax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'png');

            if($_FILES["img"]["size"] <= $taillemax){
                $extensionUpload = strtolower(substr(strrchr($_FILES["img"]["name"], "."), 1));
                if(in_array($extensionUpload, $extensionsValides)){
                    $title_img = lowerAndNoAccent($_POST["title"]);
                    $img = "public/img/articles/".$title_img.".".$extensionUpload;
                    $resultat = move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                    if($resultat){
                        setProduct($product["id"], $_POST["title"], $_POST["descr"], $img, $_POST["price"], $_POST["detailed_descr"]);
                        header("Location: ".ROOT_PATH."products");
                        exit();
                    }
                    else{
                        $_SESSION["error"] = "Erreur lors de l'importation de la photo";
                        header("Location: ".ROOT_PATH."products");
                        exit();
                    }
                }
                else{
                    $_SESSION["error"] = "L'extension de la photo de l'article est mauvaise";
                    header("Location: ".ROOT_PATH."products");
                    exit();
                }
            }
            else{
                $_SESSION["error"] = "La photo de l'article dépasse 2Mo";
                header("Location: ".ROOT_PATH."products");
                exit();
            }
        }
        $content = "product_edit";
        render(compact("register", "content", "nav"));
        exit();
    }
    else if(REQ_ACTION == "delete"){
        deleteProductByTitle($article);
        header("Location: ".ROOT_PATH."products");
        exit();
    }
    $content = "product_view";
    render(compact("register", "content", "nav"));
    exit();
}
else{
    $content = "products";
    render(compact("register", "content", "nav"));
    exit();
}

?>