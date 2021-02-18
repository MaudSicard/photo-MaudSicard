<div class="container_form">
    <h2>Modifier ou créer une photo</h2>

    <?php require __DIR__.'/../error/errorForm.tpl.php'; ?>

    <form action="" method="POST" class="mt-5">
            <fieldset>
                <label for="title">Titre de la photo : </label>
                <input type="text" class="form-control" id= "title" name="title" placeholder="  Titre de la photo" value="<?= isset($currentPicture) ? $currentPicture->getTitle() : ''; ?>">
            </fieldset>

            <fieldset>
                <label for="picture">Emplacement de la photo : </label>
                <input type="text"  id="picture" name="picture" placeholder="  Emplacement de la photo" aria-describedby="subtitleHelpBlock" value="<?= isset($currentPicture) ? $currentPicture->getPicture() : ''; ?>">
            </fieldset>

            <fieldset>
                <label for="category">Catégorie de la photo : </label>
                <input type="text" class="form-control" id="category" name="category" placeholder="  Catégorie de la photo" value="<?= isset($currentPicture) ? $currentPicture->getCategory() : ''; ?>">
            </fieldset>

             <!-- Le token CSRF -->
            <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">

            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
            <button>
                <a href = "<?=$router->generate('main_gestion');?>">Gestion de la base de données</a>
            </button>
    </form>
</div>