<?php 

include_once("models/products.php");

include("app/controllers.php");

if(isset($_POST["title"]) && isset($_POST["descr"]) && isset($_POST["detailed_descr"]) && isset($_POST["price"])){
    $title = $_POST["title"];
    $descr = $_POST["descr"];
    $price = $_POST["price"];
    $detailed_descr = $_POST["detailed_descr"];

    if(isset($_FILES["img"]) && !empty($_FILES["img"]["name"])){
        $taillemax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'png');

        if($_FILES["img"]["size"] <= $taillemax){
            $extensionUpload = strtolower(substr(strrchr($_FILES["img"]["name"], "."), 1));

            if(in_array($extensionUpload, $extensionsValides)){
                $title_img = lowerAndNoAccent($title);
                $img = "public/img/articles/".$title_img.".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES["img"]["tmp_name"], $img);

                if($resultat){
                    if(getProductByTitle($title)){
                        $_SESSION["error"] = "/!\ Un article avec ce titre existe déjà veuillez recommencer /!\ ";
                        header("Location: ".ROOT_PATH."products");
                        exit();
                    }
                    else{
                        addProduct($title, $descr, $price, $img, $detailed_descr);
                        header("Location: ".ROOT_PATH."products");
                        exit();
                    }
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
    else{
        $_SESSION["error"] = "La photo de l'article dépasse 2Mo";
        header("Location: ".ROOT_PATH."products");
        exit();
    }
}

$content = "new_product";
$nav = "nav";

if(empty($_SESSION["login"])){
    $register = "login_signup";
}
else{
    $register = "user_board";
}

render(compact("register", "content", "nav"));

?>