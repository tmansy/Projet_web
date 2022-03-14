<?php if(!isset($_SESSION["login"])): ?>

<div class="text-center">
    <h4 class="alert alert-danger w-50 mt-2 ms-2"><i class="bi bi-exclamation-diamond-fill mx-2"></i>Vous devez vous identifier pour confirmer votre commande.<i class="bi bi-exclamation-diamond-fill ms-2"></i></h4>
</div>

<?php else: ?>

<div class="text-center fs-5">
    <div class="alert alert-success w-50 mt-2 ms-2"><i class="bi bi-check-circle-fill mx-2"></i>Votre commande a bien été effectuée. Elle sera traitée dans les plus brefs délais.<i class="bi bi-check-circle-fill ms-2"></i><br/><a href="<?= ROOT_PATH.'order_status'?>">Voir le statut de ma commande</a></div>
</div>

<?php endif; ?>