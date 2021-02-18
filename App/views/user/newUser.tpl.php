<div class="container_form">
    <h2>Créer un nouvel utilisateur</h2>

    <?php require __DIR__.'/../error/errorForm.tpl.php'; ?>

    <form action="<?= $router->generate('new_user_post'); ?>" method="POST" class="mt-5">

            <fieldset>
                <label for="mail">Email : </label>
                <input type="text" class="form-control" id= "mail" name="mail" placeholder="  Email de l'utilisateur" value="<?= $user->getMail() ?>">
            </fieldset>

            <fieldset>
                <label for="firstname">Prénom : </label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="  Prénom" aria-describedby="subtitleHelpBlock" value="<?= $user->getFirstname() ?>">
            </fieldset>

            <fieldset>
                <label for="lastname">Nom de famille : </label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="  Nom de famille" value="<?= $user->getLastname() ?>">
            </fieldset>

            <fieldset>
                <label for="password">Mot de passe : </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="  Mot de passe" value="">
            </fieldset>

            <fieldset>
                <label for="role">Rôle : </label>
                <select type="text" class="form-control" id="role" name="role" placeholder="Rôle">
                    <option value="admin" <?= $user->getRole() == 'admin' ? 'selected' : '' ?>>Administrateur</option>
                    <option value="catalog-manager"<?= $user->getRole() == 'catalog-manager' ? 'selected' : '' ?>>Gestionnaire du catalogue</option>
                </select>
            </fieldset>

            <fieldset>
                <label for="statut">Statut : </label>
                <select type="text" class="form-control" id="statut" name="statut" placeholder="Statut">
                    <option value="actif" <?= $user->getStatut() == 'actif' ? 'selected' : '' ?>>Actif</option>
                    <option value="désactivé" <?= $user->getStatut() == 'désactivé' ? 'selected' : '' ?>>Désactivé</option>
                </select>
            </fieldset>

            <!-- Le token CSRF -->
          <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">
          
            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
        </form>
</div>