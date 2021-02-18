<?php if (!empty($errorList)): ?>

<?php foreach ($errorList as $error): ?>

  <div class="error">
    <?= $error; ?>
</div>

<?php endforeach; ?>

<?php endif; ?>