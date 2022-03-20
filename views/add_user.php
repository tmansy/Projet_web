<?php if(isset($_SESSION["errorAddAdmin"])): ?>

    <div class="alert alert-danger w-25 mt-2 mx-2 text-center"><?= $_SESSION["errorAddAdmin"] ?></div>

<?php unset($_SESSION["errorAddAdmin"]); endif; ?>

<h3 class="form_new_product text-decoration-underline mt-4 ms-5 mb-3"><strong>Formulaire d'ajout d'admin ou d'utilisateur</strong></h3>

<div class="border border-2 ms-4 me-4 media">
    <form class="ms-5 pt-3" enctype="multipart/form-data" action="add_user" method="POST">
        <label class="form-label text-decoration-underline" for="username">Nom d'utilisateur :</label><br/>
        <input class="px-2" type="text" id="username" name="username"  size="50" required><br/><br/>
        
        <label class="form-label text-decoration-underline" for="mail">Adresse e-mail :</label><br/>
        <input class="px-2" type="email" id="mail" name="mail" size="50" required></input><br/><br/>

        <label class="form-label text-decoration-underline" for="mdp">Mot de passe :</label><br/>
        <input class="px-2" type="password" id="mdp" name="mdp" size="50" required></input><br/><br/>

        <label class="form-label text-decoration-underline" for="confirmed_mdp">Confirmation mot de passe :</label><br/>
        <input class="px-2" type="password" id="confirmed_mdp" name="confirmed_mdp" size="50" required></input><br/><br/>

        <input type="radio" name="newAdmin" id="admin" value="admin"><label for="admin">Admin</label><br/>
        <input type="radio" name="newAdmin" id="user" value="user"><label for="user">User</label><br/><br/>

        <button class="btn btn-style mb-4" type="submit">Inscrire</button>
    </form>
</div>
<br/>