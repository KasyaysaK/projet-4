<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
    			<h2 class="">Liste des chapitres</h2>
   
				    <?php
				    	while ($post = $posts->fetch())
				    	{
				    ?>
					        <div class="">
					            <h3> <?= htmlspecialchars($post['title']); ?> </h3>
					            
					            <p>
					                <?= htmlspecialchars(substr($post['content'], 0, 90)) ?>...
					                <a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="btn btn-dark">Lire la suite</a>
					           
					            </p>
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

