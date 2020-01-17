<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
	<div class="container my-5">
		<div class="row">
			<div class="col-8 offset-2 text-center">
    			<h2 class="">Liste des chapitres</h2>
   
			    <?php
			    	while ($post = $posts->fetch())
			    	{
			    ?>

				<div class="card content">
					<div class="card-header d-flex justify-content-between">
						 <h3 class="card-title"><?= htmlspecialchars($post['title']); ?></h3>
					</div>
				   <div class="card-body">
				   		<div class="card-text">
				   			<p>
					        	<?= htmlspecialchars(substr($post['content'], 0, 120)) ?>...
					    	</p>

				   		</div>
					    
				    </div>
				    <div class="card-footer"><a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="btn btn-dark">Lire la suite</a></div> 
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

