<div class="container_photos">     
      <?php
          foreach($currentPictures as $picture)
          {
            echo '<figure>';
                echo '<img class="photo" src="' . $_SERVER['BASE_URI'] .'/'. $picture->getPicture() . '" alt="photo ' . $picture->getCategory() . '">';
            echo '</figure>';       
          }
       ?>
</div>
                  
