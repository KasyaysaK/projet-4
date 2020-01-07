<?php ob_start(); ?>

	<form method="post">
      <textarea id="mytextarea">Hello, World!</textarea>
    </form>
<!-- Modifier un article -->
<!-- Supprimer un article -->

<?php $content = ob_get_clean(); ?>
  
    

<?php require('template.php'); ?>
