
<div class="container_form">
    <form action="<?= $router->generate('user_login_post'); ?>" method="POST" class="mt-5">
    
            <h2>Se connecter à son espace personnel</h2>
    
            <?= isset($welcome) ? $welcome : '';?>
            <fieldset>
                <label for="mail">Email : </label>
                <input type="text" id="mail" name="mail" placeholder="  Email de l'utilisateur" value="<?= $user->getMail() ?>">
            </fieldset>

            <fieldset>
                <label for="lastname">Mot de passe : </label>
                <input type="password" id="password" name="password" placeholder="  Mot de passe" value="">
            </fieldset>
          
            <button type="submit">Valider</button>

            <button>
                <a href = "<?=$router->generate('new_user');?>">Créer son espace personnel</a>
            </button>

            <button>
                <a href = "<?=$router->generate('main_gestion');?>">Gestion de la base de données</a>
            </button>
    </form>
</div>