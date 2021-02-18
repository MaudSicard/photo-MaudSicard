<table>
    <thead>
        <th>Nom de la catégorie</th>
        <th>Modifier</th>
    </thead>
    <tbody>
<?php
    foreach($currentPictures as $picture)
    {
        echo '<td>' . $picture->getName() . '</td>';
        echo '<td><a href = "'. $router->generate('update_picture') . $picture->getName() .'">&#128679;</a></td>';
    }
?>
    </tbody>
</table>