<?php ob_start(); ?>

	<div class="container mt-4">
		<div  class="my-4">
			<h2>Modifier l'article</h2>
		</div>

		<div>
			<h2></h2> <p></p>
		</div>

		<form class="row" action="index.php?action=updatePost" method="post">
			<div class="col-sm-10">
				<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" value="<?= htmlspecialchars($postToEdit['title']) ?>" />
				<textarea class="post-editor" aria-describedby="contenu" name="postToEdit"> 
					<p><?= htmlspecialchars($postToEdit['content']) ?> </p> 
				</textarea>
			</div>
			<div>
				<div>
					<div class="col my-2">
						<button type="submit" class="btn btn-light">Modifier</button>
						<a href="index.php?action=showDashboard" class="btn btn-light">Annuler</a>

					</div>
					
				</div>
			</div>

	    </form>
	</div>

<?php $content = ob_get_clean(); ?>
  
    

<?php require('template.php'); ?>
