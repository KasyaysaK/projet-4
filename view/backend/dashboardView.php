<?php ob_start(); ?>

<div>
	<div> 
		<h2 class="d-flex justify-content-center my-4">Articles publiés</h2> 
	</div>
	
	<div>
		<table class="table table-light table-striped">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Titre</th>
	      <th scope="col">Date de publication</th>
	      <th>Action</th>

	    </tr> 		
	  </thead>
	  <tbody>
	  		<?php var_dump($posts) ?>
	  	
	  	<?php foreach ($posts as $post): ?>
		    <tr>
		      <th scope="row"><?= $post['id'] ?></th>
		      <td><?= htmlspecialchars($post['title']); ?></td>
		      <td><?= $post['creation_date_fr'] ?></td>
		      <td><i class="fas fa-edit"></i> <i class="far fa-trash-alt"></td>
		    </tr>
		<?php endforeach;?>
	  </tbody>
	</table>
	</div>	
</div>

<div>
	<div class="d-flex justify-content-center my-4"> 
		<h2>Commentaires publiés</h2> 
	</div>
	
	<div>
		<table class="table table-light table-striped">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Nom</th>
	      <th scope="col">Commentaire</th>
	      <th scope="col">Date</th>
	      <th>Action</th>

	    </tr> 		
	  </thead>
	  <tbody>
	  	<?php foreach ($comments as $comment): ?>
		    <tr>
		      <th scope="row"><?= $comment['id'] ?></th>
		      <td><?= htmlspecialchars($comment['author']) ?></td>
		      <td><?= htmlspecialchars($comment['comment']) ?></td>
		      <td><?= $comment['comment_date_fr'] ?></td>
		      <td><i class="fas fa-edit"></i> <i class="far fa-trash-alt"></td>
		    </tr>
		<?php endforeach;?>
	  </tbody>
	</table>
	</div>
	
</div>
   	
  
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
