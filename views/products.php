<?php

if(!empty($_SESSION["error"])){
    echo "<div class='d-flex justify-content-center'><div class='alert alert-danger width_error text-center mt-3 ms-3'>".$_SESSION["error"]."</div></div>";
    unset($_SESSION["error"]);
}

if(!empty($_SESSION["message"])){
    echo "<div class='d-flex justify-content-center'><div class='alert alert-success text-center mt-3 ms-3'>".$_SESSION["message"]."</div></div>";
    unset($_SESSION["message"]);
}

if($_SESSION["isAdmin"]){
    echo '<div class="d-flex justify-content-center"><a class="button btn btn-danger width_error text-center mt-3 border border-dark border-3 button_hover" id="link_index" href="new_product">Enregistrer un nouveau produit</a></div>';
}

$compteur = count(getProducts());
$product = getProducts();

?>
<div class="ms-3">
    <div class="row row-cols-1 row-cols-md-5 w-100 d-flex justify-content-center">

<?php for($i=0; $i<$compteur; $i++) :?>

        <div class="col mt-3">
            <div class="card border border-2">
                <img src="<?= $product[$i]['img'] ?>" class="card-img-top img_card" alt="image de l'article">
                <div class="card-body">
                    <h5 class="card-title text-decoration-underline"><?= $product[$i]["title"] ?></h5>
                    <p class="card-text"><?= $product[$i]["descr"] ?></p>
                    <p class="card-text"><?= $product[$i]["price"] ?>€</p>
                </div>
                <?php 
                    $article = lowerAndNoAccent($product[$i]["title"]);
                    $article = str_replace(" ", "-", $article);
                ?>
                <div class="class-footer flex">
                    <a class="button btn btn-danger w-75 my-2 border border-dark border-3 button_hover" id="link_index" href="<?= ROOT_PATH.'products/'.$article ?>">Voir l'article</a>
                    <?php if($_SESSION["isAdmin"]) :?>
                        <a class="button btn btn-primary w-75 border border-dark border-3 button_hover2" id="link_index2" href="<?= ROOT_PATH.'products/'.$article.'/edit' ?>">Editer l'article</a>
                        <a class="button btn btn-primary w-75 my-2 border border-dark border-3 button_hover2" id="link_index2" href="<?= ROOT_PATH.'products/'.$article.'/delete' ?>">Supprimer l'article</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php endfor; ?>

    </div>
    <br/>
</div>




