<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
	<p>Vous n'êtes pas autorisé à accéder à cette page</p>
	<a href="index.php" class="btn btn-dark">Revenir à la page d'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
