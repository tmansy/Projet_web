<?php ob_start(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<div class="ms-auto">
    <button type="button" class="btn btn-style login-btn"><i class="bi bi-box-arrow-in-right"></i>Se connecter</button>
    <button type="button" class="btn btn-style register-btn"><i class="bi bi-pencil-square"></i>S'inscrire</button>
</div>  

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item login_shadow" id="tab1" role="presentation">
                    <button class="nav-link active active-modal" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true"><b>Se connecter</b></button>
                </li>
                <li class="nav-item" id="tab2" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" href="#" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false"><b>S'inscrire</b></button>
                </li>
            </ul>
            <div class="modal-body active-modal">
            <?php 
                if(!empty($_SESSION["error"])){
                    echo "<script>
                            $(document).ready(function(){
                            $('#loginModal').modal('show');
                            });
                        </script>"; 
                    echo "<div class='alert alert-danger'>".$_SESSION["error"]."</div>";
                    unset($_SESSION["error"]); 
                } 
            ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form action="login" method="POST" >
                            <fiedlset>
                                <div class="group1">
                                    <input required="" class="input" type="text" name="login_connexion"><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="date">Nom d'utilisateur</label>
                                </div>
                                <div class="group2">
                                    <input required="" class="input" type="password" name="password_connexion"><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="date">Mot de passe</label>
                                </div>
                                <div class="forgot-password">
                                    <a class="forgot-password" href="" data-bs-target="#forgot_password" data-bs-toggle="modal" data-bs-dismiss="modal">Mot de passe oublié ?</a>
                                </div>
                                <div class="group2">
                                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                                </div>
                            </fiedlset>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form action="signup" method="POST">
                            <fieldset>
                                <div class="group1">
                                    <input required="required" class="input" type="text" name="login_inscription"><span class="highlight"></span><span class="bar"></span>
                                    <label class="label">Nom d'utilisateur</label>
                                </div>
                                <div class="group2">
                                    <input required="required" class="input" type="email" name="mail_inscription"><span class="highlight"></span><span class="bar"></span>
                                    <label class="label">Adresse e-mail</label>
                                </div>
                                <div class="group2">
                                    <input required="required" class="input" type="password" name="password_inscription"><span class="highlight"></span><span class="bar"></span>
                                    <label class="label">Mot de passe</label>
                                </div>
                                <div class="group2">
                                    <input required="required" class="input2 input" type="password" name="password_verify_inscription"><span class="highlight"></span><span class="bar"></span>
                                    <label class="label">Confirmation mot de passe</label>
                                </div>
                                <div class="group2">
                                    <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="forgot_password" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content active-modal">
            <div class="modal-header d-flex">
                <button class="bg-transparent back_button" data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal"><span class="bi bi-caret-left"></span></button>
                <h6 class="mt-2">Un mail sera envoyé dans votre boîte de réception pour changer votre mot de passe.</h6>
            </div>
            <div class="modal-body">
                <div class="group1">
                    <input required="" class="input" type="text"><span class="highlight"></span><span class="bar"></span>
                    <label class="label" for="date">Adresse e-mail</label>
                </div>
                <div class="group2">
                    <button type="button" class="btn btn-primary w-100">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $register = ob_get_clean(); ?>