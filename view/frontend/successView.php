<?php ob_start(); ?>
	
	<div><p>Le commentaire a bien été signalé</p></div>
	<a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="btn btn-dark">Revenir au chapitre</a>
	<a href="index.php?action=listPosts" class="btn btn-dark">Revenir à la liste des chapitres</a>

<?php $content = ob_get_clean(); ?>
