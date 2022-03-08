<?php include_once("models/users.php"); ?>

<div class="dropdown ms-auto px-4">
  <button class="btn btn-style dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?= $_SESSION["login"]?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Mon compte</a></li>
    <?php 
    $user = getUserByLogin($_SESSION["login"]);
    if($user["type"] == "admin"){
      echo "<li><a class='dropdown-item' href='#'>Ajouter un utilisateur</a></li>";
    }
    ?>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="logout">Se déconnecter</a></li>
  </ul>
</div>