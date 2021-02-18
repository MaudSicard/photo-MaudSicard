        <nav>
          <ul  class="container_nav_ul">
            <li><a href = "<?=$router->generate('main_home');?>">Home</a></li>
            <li><a href = "<?=$router->generate('article_biographie');?>">Biographie</a></li>

            <?php
              foreach($categoryList as $categoryObject)
              {
                echo '<li><a href = "' . $router->generate('pictures') . $categoryObject->getName() .'">' . $categoryObject->getName() .'</a></li>';
              }
              ?>

            <li><a href = "<?=$router->generate('main_contact');?>">Contact</a></li>
          </ul>
        </nav>

