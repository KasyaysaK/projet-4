<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
	<div class="container">
		<div class="row">
			<div class="col-8 offset-2 text-center">
    			<h2 class="">Liste des chapitres</h2>
   
				    <?php
				    	while ($post = $posts->fetch())
				    	{
				    ?>
					        <div class="my-5">
					            <h3> <?= htmlspecialchars($post['title']); ?> </h3>
					            
					            <p>
					                <?= htmlspecialchars(substr($post['content'], 0, 120)) ?>...
					            </p>
					               <a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="btn btn-dark">Lire la suite</a>
					        </div>
				    <?php
				    	}
				    	$posts -> closeCursor();
				    ?>

		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

