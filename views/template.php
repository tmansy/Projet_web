<!doctype html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Café bio en ligne - Costa Coffee</title>
  </head>

  <body>
    <header> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent border-bottom">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= ROOT_PATH?>"><img src="/public/img/logo.png" alt="Logo Cafe" width="60px" height="60px" id="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <?php include("views/".$nav.".php"); ?>
                    </ul>
                    <?php include("views/".$register.".php"); ?>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php include("views/".$content.".php"); ?>
    </main>

    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/public/js/bootstrap.js"></script>
    <script type="text/javascript" src="/public/js/typewriter.js"></script>
    <script type="text/javascript" src="/public/js/chart.js"></script>
    <script type="text/javascript" src="/public/js/shadow_modal.js"></script>
    <script type="text/javascript" src="/public/js/login_form.js"></script>
    <script type="text/javascript" src="/public/js/swap_login_btn.js"></script>

  </body>

</html>
