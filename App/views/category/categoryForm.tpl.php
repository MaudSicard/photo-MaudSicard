<div class="container_form">
    <h2>Modifier ou créer une catégorie</h2>

    <?php require __DIR__.'/../error/errorForm.tpl.php'; ?>

    <form action="" method="POST" class="mt-5">
    
            <fieldset>
                <label for="name">Nom de la catégorie : </label>
                <input type="text"  id= "name" name="name" placeholder="  Nom de la catégorie" value="<?= isset($currentCategory) ? $currentCategory->getName() : '' ?>">
            </fieldset>

             <!-- Le token CSRF -->
            <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">
          
            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>

            <button>
                <a href = "<?=$router->generate('main_gestion');?>">Gestion de la base de données</a>
            </button>
    </form>
</div>