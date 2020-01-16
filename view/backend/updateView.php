<?php ob_start(); ?>

	<div class="container mt-4">
		<div  class="my-4">
			<h2>Modifier l'article</h2>
		</div>

		<div>
			<h2></h2> <p></p>
		</div>

		<form class="row" action="index.php?action=" method="post">
			<div class="col-sm-10">
				<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" value="<?= htmlspecialchars($postToEdit['title']) ?>" />
				<textarea class="post-editor" aria-describedby="contenu" name="postToEdit"> 
					<p><?= htmlspecialchars($postToEdit['content']) ?> </p> 
				</textarea>
			</div>
			<div>
				<div>
					<button type="button" class="btn btn-light" data-toggle="modal" data-target="#publish-post">Publier</button>
					
				</div>
			</div>

	    </form>
	</div>

<?php $content = ob_get_clean(); ?>
  
    

<?php require('template.php'); ?>
