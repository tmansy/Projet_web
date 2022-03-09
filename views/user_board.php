<?php include_once("models/users.php"); ?>

<div class="dropdown ms-auto">
  <button class="btn btn-style dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?= $_SESSION["login"]?>
  </button>
  <a class="btn btn-style" type="button" href="<?= ROOT_PATH.'cart/'.'mon-panier'?>"><i class="bi bi-cart"></i>Mon panier</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Mon compte</a></li>
    <?php 
    if($_SESSION["isAdmin"]){
      echo "<li><a class='dropdown-item' href='#'>Ajouter un utilisateur</a></li>";
    }
    ?>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="<?= ROOT_PATH.'logout' ?>">Se déconnecter</a></li>
  </ul>
</div>