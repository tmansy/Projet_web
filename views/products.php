<?php 
$user = getUserByLogin($_SESSION["login"]);
ob_start(); 
?>

<li class="nav-item px-3">
    <a class="nav-link border-hover" href="<?=ROOT_PATH?>">Accueil</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover active" href="#">Produits</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="#">A propos</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="#">Contacts</a>
</li>

<?php
$nav = ob_get_clean();
if($user["type"] == "admin"){
    echo '<a href="new_product">Enregistrer un nouveau produit</a>';
}
?>

<?php
$content = ob_get_clean();
include("views/template.php");

?>
