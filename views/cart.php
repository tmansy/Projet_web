<?php
    $produits_in_panier = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();   
    $produits = array();   
    $subtotal = 0.00;   
    if($produits_in_panier){   
        $array_to_question_marks = implode(',', array_fill(0, count($produits_in_panier), '?'));
        $produits = productInCart($array_to_question_marks, $produits_in_panier);
    }  
    foreach ($produits as $produit) {   
        $subtotal += (float)$produit['price'] * (int)$produits_in_panier[$produit['id']];   
    }            
?>


<div class="border border-2 ms-4 me-4 mt-4 media view_item">
    <h1 class="text-decoration-underline text-center">Mon panier</h1>
    <form action="<?= ROOT_PATH.'cart/'.'mon-panier' ?>" method="POST">
        <table class="table">
            <thead class="fs-4">
                <tr>
                    <th scope="col" colspan="2">Produit</td>
                    <th scope="col">Prix</td>
                    <th scope="col">Quantité</td>
                    <th scope="col">Total</td>
                </tr>
            </thead>
            <tbody class="fs-5">
                <?php if(empty($produit)): ?>
                    <tr>
                        <td colspan="5" class="fs-3">Vous n'avez ajouté aucun produit dans votre panier</td>
                    </tr>
                <?php else: ?>
                <?php foreach($produits as $produit): ?>
                    <tr scope="row">
                        <td><img src="<?= ROOT_PATH.$produit["img"] ?>" width="100" height="100" alt="<?= $produit["title"] ?>"></td>
                        <td><a class="text-decoration-none text-white" href="<?= ROOT_PATH.'products/'.lowerAndNoAccent($produit["title"])?>"><?= $produit["title"] ?>
                        <br/>
                        <button class="btn btn-style btn-height" type="submit" name="delete" value="<?= $produit["id"] ?>"><i class="bi bi-trash    "></i>Supprimer</button></td>
                        <td><?= $produit["price"] ?> €</td>
                        <td><input class="w-50" type="number" name="quantite-<?= $produit["id"] ?>" value="<?= $produits_in_panier[$produit["id"]] ?>"></td>
                        <td><?= $produit["price"] * $produits_in_panier[$produit["id"]] ?> €</td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <span class="d-flex justify-content-end me-2">Sous total : <?= $subtotal ?> €</span>
        <input class="btn btn-style mb-2 mx-2" type="submit" value="Mettre à jour les quantités" name="update">
        <input class="btn btn-style mb-2 mx-1" type="submit" value="Valider la commande" name="order">
    </form>
</div>