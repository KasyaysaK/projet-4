<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>

   	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				 <!-- breadcrumbs -->
				<p><a class="nav-link" href="index.php">Retourner à la page d'accueil</a></p>

				<div class="card content">
					<div class="card-header">
						 <h3 class="card-title"><?= htmlspecialchars($post['title']) ?></h3>
				         <p class="card-subtitle">le <?= $post['creation_date_fr'] ?></p>    	
					</div>
				   <div class="card-body">
				   		<div class="card-text">
				   			<p>
					        	<?= nl2br(htmlspecialchars($post['content'])) ?>
					    	</p>

				   		</div>
					    
				    </div>
				    <div class="card-footer"><a href="#add-comment">Donnez-moi votre avis</a></div>
				    
				    
				</div>

				<h4>Commentaires</h4>
				<form id="add-comment" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
	       			 <div class="form-group">
				        <label for="author">Nom</label><br />
				        <input id="author" class="form-control form" aria-describedby="auteur" placeholder="Entrez votre nom" />
				    </div>
				    <div class="form-group">
				        <label for="comment">Commentaire</label><br />
				        <textarea id="comment" class="form-control form" aria-describedby="commentaire" placeholder="Entrez vore commentaire"></textarea>
				    </div>
				    <div>
				         <button type="submit" class="btn btn-dark">Envoyer</button>
				    </div>
	    		</form>

				<?php
					while ($comment = $comments -> fetch())
					{
				?>
				<div class="card content">
					<div class="card-header d-flex justify-content-between">
						<h5 class="card-title"><?= htmlspecialchars($comment['author']) ?></h5>
						<h6 class="card-subtitle">le <?= $comment['comment_date_fr'] ?></h6>
					</div>
					<div class="card-body">
		  	  			<p class="card-text"><?= htmlspecialchars($comment['comment']) ?></p>
					</div>
				   	<div class="card-footer">
				   		<button type="button" class="btn btn-dark flag" data-toogle="tootlip" data-placement="right"title="Signaler le commentaire">Signaler</button>
				   	</div>
				</div>

				<?php
				}
				?>
			</div>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
