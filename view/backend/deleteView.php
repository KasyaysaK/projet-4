<?php ob_start(); ?>

<div class="container">
	<div class="row text-center my-4"> 
		<div class="col">
			<h4>L'article a bien été supprimé</h2> 
			<a href="index.php?action=showDashboard" class="btn btn-light">Afficher le gestionnaire</a>
		</div>
		
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
