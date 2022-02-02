<?php ob_start(); ?>

<li class="nav-item px-3">
    <a class="nav-link border-hover active" href="<?=ROOT_PATH?>">Accueil</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="view/products.php">Produits</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="view/who.php">A propos</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="#">Contacts</a>
</li>

<?php
$nav = ob_get_clean();
ob_start();
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 id="typewriter"></h1>
            <p>CAFÉ DE QUALITÉ, ÉTHIQUE ET ÉCO-RESPONSABLE. Importé en direct. Torréfié artisanalement. Livré à votre porte.</p>
            <p class="border border-3 border-dark rounded w-25" id="link_index">Venez découvrir dès à présent notre gamme.</p>
        </div>
</div>

<?php
$content = ob_get_clean();
include("views/template.php");
?>
