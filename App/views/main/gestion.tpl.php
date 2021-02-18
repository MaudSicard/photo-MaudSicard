<form class="container_form">
<table class="container_form">

<?php require __DIR__.'/../error/errorForm.tpl.php'; ?>


<?= isset($welcome) ? $welcome : '';?>
    <thead>
        <th>Nom de la catégorie</th>
        <th>Modifier</th>
    </thead>
    <tbody>
<?php
    foreach($categoryList as $categoryObject)
    {
        echo '<tr>';
            echo '<td><a href = "'. $router->generate('pictures_list_form') . $categoryObject->getName() .'">' . $categoryObject->getName() . '</a></td>';
            echo '<td><a href = "'. $router->generate('update_category') . $categoryObject->getName() .'">&#128679;</a></td>';
            echo '</tr>';
    }
?>
    </tbody>
</table>
    <button>
        <a href = "<?=$router->generate('insert_category');?>">Ajouter une catégorie</a>
    </button>
</form>
