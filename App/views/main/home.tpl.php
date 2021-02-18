<div class="container_photos">
        <?php  
            $index = 1;
            foreach($picturesList as $currentPicture)
            {
                foreach($categoryList as $categoryObject) 
                {
                    if ($categoryObject->getName() == $currentPicture->getCategory() && $currentPicture->getId() == $index)
                    {
                        $index += 10;
                        echo '<figure>';
                            echo '<figcaption>' . $categoryObject->getName() . '</figcaption>';
                            echo '<a class = "container_photos_a" href = "' . $router->generate('pictures') . $categoryObject->getName() . '">';
                                echo '<img class="photo" src="'. $_SERVER['BASE_URI'] .'/'  . $currentPicture->getPicture() .'" alt="photo nature">';
                            echo '</a>';
                        echo '</figure>';
                    }
                }
            }      
        ?>
</div>