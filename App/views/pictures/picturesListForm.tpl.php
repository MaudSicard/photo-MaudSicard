<form  class="container_form">
<table class="container_form">
    <thead>
        <th>Nom de la photo</th>
        <th>Modifier</th>
    </thead>
    <tbody>
<?php
    foreach($currentPictures as $picture)
    {
        echo '<tr>';
            echo '<td>' . $picture->getTitle() . '</td>';
            echo '<td><a href = "'. $router->generate('update_picture') . $picture->getId() .'">&#128679;</a></td>';
            echo '</tr>';
    }
?>
    </tbody>
</table>
<button>
    <a href = "<?=$router->generate('main_gestion');?>">Gestion de la base de données</a>
</button>
<button>
    <a href = "<?=$router->generate('insert_picture');?>">Ajouter une photo</a>
</button>
</form>
