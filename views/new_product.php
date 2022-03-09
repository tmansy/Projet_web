<h3 class="form_new_product text-decoration-underline mt-4 ms-5 mb-3"><strong>Formulaire d'ajout d'articles</strong></h3>

<div class="border border-2 ms-4 me-4 media">
    <form class="ms-5 pt-3" enctype="multipart/form-data" action="new_product" method="POST">
        <label class="form-label text-decoration-underline" for="title">Titre de l'article :</label><br/>
        <input class="px-2" type="text" id="title" name="title"  size="50" required><br/><br/>
        
        <label class="form-label text-decoration-underline" for="descr">Description de l'article :</label><br/>
        <textarea class="px-2" type="text" id="descr" name="descr" rows="4" cols="50" required></textarea><br/><br/>

        <label class="form-label text-decoration-underline" for="descr">Description détaillée de l'article :</label><br/>
        <textarea class="px-2" type="text" id="descr" name="detailed_descr" rows="4" cols="50" required></textarea><br/><br/>

        <label class="form-label text-decoration-underline" for="price">Prix de l'article (en €) :</label><br/>
        <input class="px-2" type="number" min="0.00" max="10000.00" step="0.01" name="price" required><br/><br/>

        <label class="form-label text-decoration-underline" for="img">Image de l'article :</label><br/>
        <input class="form-control w-50 px-2" type="file" name="img" id="formFile" required><br/><br/>

        <button class="btn btn-style mb-4" type="submit">Envoyer</button>
    </form>
</div>
<br/>