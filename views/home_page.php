<?php ob_start(); ?>

<li class="nav-item px-3">
    <a class="nav-link border-hover active" href="<?=ROOT_PATH?>">Accueil</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="products">Produits</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="#">A propos</a>
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
            <h1>Le café, une boisson pour <span id="typewriter"></span></h1>
            <h5 class="pt-3">Vous cherchez à acheter du café en grain de qualité torréfié par des torréfacteurs près de chez vous? 
                <br/>Vous êtes au bon endroit ☕. 
                <br/>Ici, vous trouverez de super grains torréfiés artisanalement.
            </h5>
            <h5>
                <br/><span class="bi bi-check-lg"> Café de qualité, éthique et eco-responsable.</span>
                <br/><br/><span class="bi bi-check-lg"> Importé en direct.</span>
                <br/><br/><span class="bi bi-check-lg"> Torréfié artisanalement.</span>
                <br/><br/><span class="bi bi-check-lg"> Livré à votre porte.</span>
            </h5>
            <button type="button" class="btn btn-danger w-25 mt-4 border border-dark border-3 button_hover" id="link_index" href="#">
                <h5 class="mt-1">Venez découvrir notre gamme</h5>
            </button>
            </span>
        </div>
</div>

<?php
$content = ob_get_clean();
include("views/template.php");
?>
