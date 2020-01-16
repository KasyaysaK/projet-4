<?php ob_start(); ?>
	
	<?php if (isset($_GET['idPost'])): ?>
		<p>L'article a bien été modifié.</p>
	<?php else: ?>
		<p>L'article a bien été crée.</p>
  	<?php endif; ?>


<?php $content = ob_get_clean(); ?>