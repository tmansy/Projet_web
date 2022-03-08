<li class="nav-item px-3">
    <?php
    if($_SERVER["REQUEST_URI"] == "/"){
        echo '<a class="nav-link border-hover active" href="'.ROOT_PATH.'">Accueil</a>';
    }
    else{
        echo '<a class="nav-link border-hover" href="'.ROOT_PATH.'">Accueil</a>';
    }
    ?>
</li>
<li class="nav-item px-3">
    <?php
    if($_SERVER["REQUEST_URI"] == "/products" || $_SERVER["REQUEST_URI"] == "/new_product"){
        echo '<a class="nav-link border-hover active" href="'.ROOT_PATH.'products">Produits</a>';
    }
    else{
        echo '<a class="nav-link border-hover" href="'.ROOT_PATH.'products">Produits</a>';
    }
    ?>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="#">A propos</a>
</li>
<li class="nav-item px-3">
    <a class="nav-link border-hover" href="#">Contacts</a>
</li>