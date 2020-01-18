<?php ob_start(); ?>

<div class="container">
		<h2 class="d-flex justify-content-center my-4">Tous les articles</h2> 
	
	<div>
		<table class="table table-light table-striped">
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
		      <td><?= htmlspecialchars(substr($post['content'], 0, 60)) ?>...</td>
		      <td><?= $post['creation_date_fr'] ?></td>
		      <td>
		      	<a href="index.php?action=getPostToEdit&amp;id=<?= $post['id'] ?>" class="btn"><i class="fas fa-edit"></i></a> | <a href="index.php?action=deletePost&amp;postId=<?= $post['id'] ?>" class="btn"><i class="far fa-trash-alt"></i></a> 
		      </td>
		    </tr>
		<?php endwhile ?>
		    
	  </tbody>
	</table>
	</div>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
