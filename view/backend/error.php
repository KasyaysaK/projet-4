<?php ob_start(); ?>   
    <div class="container my-5">
		<div class="row">
			<div class="col-8 offset-2 text-center">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						 <h3 class="card-title">Une erreur est survenue !</h3>
					</div>
				   <div class="card-body">
				   		<div class="card-text">
				   			<p>
					        	Veuillez écrire le billet avant de le publier.
					    	</p>

				   		</div>
					    
				    </div>
				    <div class="card-footer"><a href="index.php?action=showDashboard" class="btn btn-light">Afficher le gestionnaire</a></div> 
				</div>
			</div>
		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>