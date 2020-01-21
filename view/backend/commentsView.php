<?php ob_start(); ?>

<div class="container">
	
	<div class="d-flex justify-content-center my-4"> 
		<h2>Tous les commentaires</h2> 
	</div>
	
	<div>
		<table class="table table-light table-striped">
	  		<thead>
			    <tr>
				    <th scope="col">Nom</th>
				    <th scope="col">Commentaire</th>
				    <th scope="col">Date de publication</th>
			      	<th scope="col">Signalement</th>
			      	<th>Action</th>
			    </tr> 		
			</thead>
		  	<tbody>
			  	<?php while ($comment = $comments->fetch()): ?>
			    <tr>
			      	<td><?= htmlspecialchars($comment['author']) ?></td>
			      	<td><?= htmlspecialchars($comment['comment']) ?></td>
			      	<td><?= $comment['comment_date_fr'] ?></td>
			      	<td><?= $comment['flagged'] ?></td>
			      	<td class="mx-2">
				      	<a href="index.php?action=rejectComment&amp;commentId=<?= $comment['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a>
			      	</td>
			    </tr>
				<?php endwhile ?>
		  	</tbody>
		</table>
	</div>
	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
