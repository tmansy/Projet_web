<?php 

$books = getAllBooksByUser($_SESSION["login"]); 
$formated_books = formattedBook($books);

?>

<?php if($books): ?>
<?php $x = 0 ?>
<?php foreach($formated_books as $book): ?>
    <?php $prixTot = 0; $sousTot = 0 ?>
    <div class="accordion w-50 mt-3 mx-3 bg-success" id="accordionExample-<?= $x ?>">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-<?= $x ?>" aria-expanded="true" aria-controls="collapseTwo-<?= $x ?>">Numéro de commande : <?= $book["numCommande"]?></button>
            </h2>
            <div id="collapseTwo-<?= $x ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo-<?= $x ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <span class="fs-5 text-decoration-underline">Nom de l'utilisateur</span> : <?=$book["login"]?><br/>
                    <span class="fs-5 text-decoration-underline">Articles dans la commande</span> : <br/>
                    <?php foreach($book["articlesArray"] as $article): ?>
                        <br/>
                        <ul class="list-group w-50">
                            <li class="list-group-item fs-6 fw-bolder"><?= $article["ArticlesNoms"]?></li>
                            <li class="list-group-item fst-italic">Quantité : <?= $article["ArticlesQuantite"] ?></li>
                            <li class="list-group-item fst-italic">Prix unitaire : <?= $article["ArticlesPrix"] ?>€</li> 
                            <li class="list-group-item fst-italic">Prix total : <?= $prixTot = ($article["ArticlesPrix"] * $article["ArticlesQuantite"]); $sousTot += $prixTot; ?>€</li>               
                        </ul>
                    <?php endforeach; ?><br/>
                    <span class="fs-5 text-decoration-underline">Sous total de la commande</span> : <?= $sousTot ?>€</br/>
                    <span class="fs-5 text-decoration-underline">Statut de la commande</span> : <?= $book["statut"]; if($book["statut"] == "En attente"){ echo " de confirmation";}?>
                </div>
            </div>
        </div>
    </div>
<?php $x++; ?>
<?php endforeach; ?>
<?php else: ?>
    <div class="bg-primary text-black w-25 border border-2 mt-3 mx-3 text-center">Aucune commande réalisée sur ce compte</div>
<?php endif; ?>
