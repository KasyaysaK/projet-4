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
		       		<td><?= $post['title']; ?></td>
			      	<td><?= substr($post['content'], 0, 50) ?>...</td>
			      	<td><?= $post['creation_date_fr'] ?></td>
			      	<td>
				      	<a class="btn" href="index.php?action=getPostToEdit&amp;id=<?= $post['id'] ?>"><i class="fas fa-edit"></i></a> | 
						<a href="index.php?action=deletePost&amp;postId=<?= $post['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a> 
					</td>
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
				      		<a class="btn" href="index.php?action=validateComment&amp;commentId=<?= $comment['id'] ?>"><i class="fas fa-check"></i></a> <a class="btn" href="index.php?action=rejectComment&amp;commentId=<?= $comment['id'] ?>"><i class="fas fa-times"></i></a>
				     	</td>
				    </tr>
				<?php endwhile ?>
		  </tbody>
		</table>
	</div>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
