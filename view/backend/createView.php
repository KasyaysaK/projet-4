<?php ob_start(); ?>

	<div class="container mt-4">
		<div  class="my-4">
			<h2>Ajouter un nouvel article</h2>
		</div>
		<form class="row" method="post">
			<div class="col-sm-9">
				<div class="post-editor" name="postToEdit"> 
					<h2>Titre</h2> 
					<p>Contenu</p> 
				</div>
			</div>
			<div>
				<div>
					<button type="button" class="btn btn-light" data-toggle="modal" data-target="#publish-post">Publier</button>
					<!-- Modal -->
					<div id="publish-post" class="modal fade" role="dialog">
					  	<div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      	<div class="modal-header">
							      	<h4 class="modal-title">Confirmation</h4>
							        <button type="button" class="close close-btn" data-dismiss="modal">&times;</button>
							    </div>		  
								    <div class="modal-body">
								   		<p>Êtes-vous sûr de vouloir publier l'article</p>
								    </div>
									    <div class="modal-footer">
									        <a href="index.php?action=publishPost" class="btn btn-success" data-dismiss="modal">Publier</a>
									        <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
									    </div>
						    </div>
					    </div>
					</div>
				</div>
				
				<div>
					<button type="button" class="btn btn-light" data-toggle="modal" data-target="#delete-post">Supprimer</button>
					<!-- Modal -->
					<div id="delete-post" class="modal fade" role="dialog">
					  	<div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      	<div class="modal-header">
							      	<h4 class="modal-title">Supprimer l'article</h4>
							        <button type="button" class="close close-btn" data-dismiss="modal">&times;</button>
							    </div>
							    <div class="modal-body">
							      	<p>Vous êtes sur le point de supprimer votre article</p>
							    </div>
								    <div class="modal-footer">
								        <a href="index.php?action=showDashboard" class="btn btn-success" data-dismiss="modal">Supprimer</a>
								        <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
								    </div>
						    </div>
					    </div>
					</div>
				</div>

			</div>
	      
	    </form>
	</div>

<?php $content = ob_get_clean(); ?>
  
<?php require('view/backend/template.php'); ?>
