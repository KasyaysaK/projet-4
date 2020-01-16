<?php ob_start(); ?>

	<div class="container mt-4">
		<div  class="my-4">
			<h2>Ajouter un nouvel article</h2>
		</div>
		<form class="row" action="index.php?action=publishPost&amp;id=<?= $post['id'] ?>" method="post">
			<div class="col-sm-9">
				<input id="title" class="form-control form my-2" aria-describedby="titre" name="title" placeholder="Titre de l'article" />
				<textarea class="post-editor" aria-describedby="contenu" name="content" placeholder="Contenu de l'article"> 
					<p>Contenu de l'article</p> 
				</textarea>
			</div>
			<div>
				<div class="row">
					<div class="col">
						<button type="button" class="btn btn-light" data-toggle="modal" data-target="#publish-post">Publier</button>
					</div>
				</div>
			</div>
	      
	    </form>
	</div>

<?php $content = ob_get_clean(); ?>
  
<?php require('view/backend/template.php'); ?>
