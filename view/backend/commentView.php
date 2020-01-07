<?php ob_start(); ?>

<!-- tinyMCE -->
<!-- Supprimer un commentaire -->
<!-- Modifier un commentaire -->

<?php $content = ob_get_clean(); ?>
  

<?php require('view/backend/template.php'); ?>
