<?php ob_start(); ?>

	<div class="container mt-4">
		<div  class="my-4">
			<h2>Ajouter un nouvel article</h2>
		</div>
		<form class="row" method="post">
			<div class="col-sm-9">
				<textarea id="mytextarea"></textarea>
			</div>
			<div>
				<button class="btn">Publier</button>
				<button class="btn">Brouillon</button>
				<button class="btn"><i class="far fa-trash-alt"></i></button>

			</div>
	      
	    </form>
	</div>

<?php $content = ob_get_clean(); ?>
  
    

<?php require('template.php'); ?>
