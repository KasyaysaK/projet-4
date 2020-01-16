<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
	<form action="index.php?action=showDashboard" method="POST">
  		<div class="modal-header">
	      	<h4 class="modal-title">Connexion</h4>
	        <button type="button" class="close close-btn" data-dismiss="modal">&times;</button>
    	</div>
		<div class="modal-body">
			<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" />
	    
			<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Mot de passe" />
		</div>		  		
  		<div id="index.php?action=adminLogin" class="modal-footer">
    		<button class="btn btn-dark" type="submit">Se connecter</button>
  		</div>
	</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
