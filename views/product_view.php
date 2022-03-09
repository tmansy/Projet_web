<?php 
$article = str_replace("-", " ", REQ_TYPE_ID);
$product = getProductByTitle($article); 
?>

<div class="border border-2 ms-4 me-4 mt-4 media view_item">
    <img src="../<?= $product['img'] ?>" class="img_product_view item mt-3" alt="image de l'article">
    <h2 class="text-center text-decoration-underline"><?= $product["title"] ?></h2>
    <p class="mx-2 mt-3 fs-6"><?= $product["detailed_descr"]?></p>
    <p class="mx-2 mt-5 fs-5">Prix : <?= $product["price"]?> €</p>
    <form action="<?= ROOT_PATH.'cart'?>" method="POST">
        <label class="mx-2" for="quantite">Quantité :</label>
        <input class="quantite" type="number" name="quantite" value="1" min="0" required>
        <input type="hidden" name="product_id" value="<?= $product["id"]?>">
        <input class="button btn btn-danger w-50 mx-2 my-2 border border-dark border-3 button_hover" id="link_index" type="submit" value="Ajouter au panier">
    </form>
</div>