<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
    <div class="container my-5">
		<div class="row">
			<div class="col-8 offset-2 text-center">
				<div class="card content">
					<div class="card-header d-flex justify-content-between">
						 <h3 class="card-title">Une erreur est survenue !</h3>
					</div>
				   <div class="card-body">
				   		<div class="card-text">
				   			<p>
					        	Quelque chose n'a pas fonctionné comme prévu...
					    	</p>

				   		</div>
					    
				    </div>
				    <div class="card-footer"><a href="index.php" class="btn btn-dark">Retourner à la page d'accueil</a></div> 
				</div>
			</div>
		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
