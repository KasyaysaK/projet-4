<?php ob_start(); ?>

<div class="container my-5">

	<div class="d-flex justify-content-between align-items-center my-4"> 
		<h2>Derniers articles publiés</h2> 
		<a href="index.php?action=getAllPosts">Voir tous les articles</a>
	</div>
	
	<div class="responsive-table-line">
		<table class="table table-light table-striped .w-auto">
		  	<thead>
			    <tr>
		     		<th scope="col">Titre</th>
		      		<th scope="col">Contenu</th>
	      			<th scope="col">Date de publication</th>
		      		<th>Action</th>
			    </tr> 		
		  	</thead>
	  		<tbody>
		  	<?php while ($post = $posts->fetch()): ?>
			    <tr>
		       		<td><?= htmlspecialchars($post['title']); ?></td>
			      	<td><?= htmlspecialchars(substr($post['content'], 0, 50)) ?>...</td>
			      	<td><?= $post['creation_date_fr'] ?></td>
			      	<td>
				      	<a class="btn" href="index.php?action=getPostToEdit&amp;id=<?= $post['id'] ?>"><i class="fas fa-edit"></i></a> | <!-- Button trigger modal -->
						<button class="btn" data-toggle="modal" data-target="#exampleModal">
						  <i class="far fa-trash-alt"></i>
						</button> 
					</td>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Supprimer l'article</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <p>Êtes-vous sûr de vouloir supprimer l'article ?</p>
						      </div>
						      <div class="modal-footer">
						      	<a href="index.php?action=deletePost&amp;postId=<?= $post['id'] ?>" class="btn btn-secondary flag">Supprimer</a>
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
						   
						      </div>
						    </div>
						  </div>
						</div>

			    </tr>
			<?php endwhile ?>    
	  		</tbody>
		</table>
</div>	

</div>

<div class="container my-5">
	<div class="d-flex justify-content-between align-items-center my-4"> 
		<h2>Commentaires signalés</h2> 
		<a href="index.php?action=getAllComments">Voir tous les commentaires</a>
	</div>
	
	<div class="table-responsive">
		<table class="table table-light table-striped">
	  		<thead>
			    <tr>
			      	<th scope="col">Nom</th>
			      	<th scope="col">Commentaire</th>
			      	<th scope="col">Date de publication</th>
			      	<th>Action</th>

			    </tr> 		
		  	</thead>
		  	<tbody>
		  		<?php while ($comment = $comments->fetch()): ?>
				    <tr>
				      	<td><?= htmlspecialchars($comment['author']) ?></td>
				      	<td><?= htmlspecialchars($comment['comment']) ?></td>
				      	<td><?= $comment['comment_date_fr'] ?></td>
				      	<td class="mx-2">
				      		<a class="btn" href="index.php?action=validateComment&amp;commentId=<?= $comment['id'] ?>"><i class="fas fa-check"></i></a> | <a class="btn" href="index.php?action=rejectComment&amp;commentId=<?= $comment['id'] ?>"><i class="fas fa-times"></i></a>
				     	</td>
				    </tr>
				<?php endwhile ?>
		  </tbody>
		</table>
	</div>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
