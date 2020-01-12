<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>

   	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				 <!-- breadcrumbs -->
				<p><a class="nav-link" href="index.php">Retourner à la page d'accueil</a></p>

				<div class="card content">
					<div class="card-header d-flex justify-content-between">
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
				        <input id="author" class="form-control form" aria-describedby="auteur" name="comment" placeholder="Entrez votre nom" />
				    </div>
				    <div class="form-group">
				        <textarea id="comment" class="form-control form" aria-describedby="commentaire" name="comment" placeholder="Entrez vore commentaire"></textarea>
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
				   		<button type="button" class="btn btn-dark flag" data-toggle="modal" data-target="#flag-comment"><i class="fas fa-exclamation-triangle warning"></i></button>
				   		<!-- Modal -->
						<div id="flag-comment" class="modal fade" role="dialog">
						  	<div class="modal-dialog">
							    <!-- Modal content-->
							    <div class="modal-content content">
							      	<div class="modal-header modal-header-frontend">
								      	<h4 class="modal-title">Signaler le commentaire</h4>
								        <button type="button" class="close close-btn-frontend" data-dismiss="modal">&times;</button>
								    </div>
								    <form action="index.php?action=flagComment&amp;id=<?= $post['id'] ?>" method="POST">
									    <div class="modal-body">
									      	<div class="form-check">
												<input class="form-check-input" type="radio" name="flag" value="option1">
												<label class="form-check-label" for="radio1">Contenu indésirable</label>
												</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="flag" value="option2">
												<label class="form-check-label" for="radio2">Contenu intimidant ou menacant, harcèlement</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="flag"  value="option3">
												<label class="form-check-label" for="radio3">Contenu violent, à caractère pornographique ou sexuellement explicite</label>
											</div>
									    </div>
										    <div class="modal-footer modal-footer-frontend">
										        <button type="button" class="btn btn-success" data-dismiss="modal">Signaler</button>
										        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
										    </div>
							      	</form>      	
							    </div>
						    </div>
						</div>
				   	</div>
				</div>

				<?php
				}
				$comments->closeCursor();
				?>

			</div>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
