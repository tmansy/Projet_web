<?php 
$product_with_space = str_replace("%20", " ", REQ_TYPE_ID);
$product = getProductByTitle($product_with_space); 
?>

<div class="border border-2 ms-4 me-4 mt-4 media view_item">
    <img src="../<?= $product['img'] ?>" class="img_product_view item" alt="image de l'article">
    <h2 class="text-center text-decoration-underline"><?= $product["title"] ?></h2>
    <p class="mx-2 mt-3 fs-5"><?= $product["detailed_descr"]?></p>
    <p class="mx-2 fs-5"><?= $product["price"]?> €</p>
    <a class="button btn btn-danger w-75 my-2 border border-dark border-3 button_hover" id="link_index" href="">Ajouter au panier</a>
</div>