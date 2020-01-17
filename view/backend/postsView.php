<?php ob_start(); ?>

<div class="container">
	<div> 
		<h2 class="d-flex justify-content-center my-4">Tous les articles</h2> 
	</div>
	
	<div>
		<table class="table table-light table-striped">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Titre</th>
	      <th scope="col">Contenu</th>
	      <th scope="col">Date de publication</th>
	      <th>Action</th>

	    </tr> 		
	  </thead>
	  <tbody>

	  	<?php while ($post = $posts->fetch()): ?>
		    <tr>
		      <th scope="row"><?= $post['id'] ?></th>
		      <td><?= htmlspecialchars($post['title']); ?></td>
		      <td><?= htmlspecialchars(substr($post['content'], 0, 90)) ?>...</td>
		      <td><?= $post['creation_date_fr'] ?></td>
		      <td>
		      	<a href="index.php?action=getPostToEdit&amp;id=<?= $post['id'] ?>"><i class="fas fa-edit"></a></i> | <!-- Button trigger modal -->
					<a data-toggle="modal" data-target="#exampleModal">
					  <i class="far fa-trash-alt">
					</a> 

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
					        <p>Êtes-vous sûr-e de vouloir supprimer l'article' ?</p>
					      </div>
					      <div class="modal-footer">
					      	<a href="index.php?action=deletePost&amp;postId=<?= $post['id'] ?>" class="btn btn-secondary flag">Supprimer</a>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					   
					      </div>
					    </div>
					  </div>
					</div> 
		      </td>
		    </tr>
		<?php endwhile ?>
		    
	  </tbody>
	</table>
	</div>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
