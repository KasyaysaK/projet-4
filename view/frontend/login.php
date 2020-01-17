<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
    <div class="container">
    	<div class="row">
			<div class="col-md-6 offset-md-3">
		    	<h4>Connexion</h4>
		    	<form action="index.php?action=showDashboard" method="POST">
					<div class="form-group">
						<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" />
				    </div>
				    <div class="form-group">
						<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Mot de passe" />
					</div>		  		
			  		<div id="index.php?action=adminLogin" class="modal-footer">
			    		<button class="btn btn-dark" type="submit">Se connecter</button>
			  		</div>
				</form>
		    </div>
		</div>
	</div>
	

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
