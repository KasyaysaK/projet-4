<footer class="container-fluid bg-dark">
	<div class="row d-flex justify-content-around">
		<div>À propos</div>
		<div>Synopsis</div>
		<div>Chapitres</div>
		<div>
			<a class="nav-link" href="index.php"><h1 class="name">Jean Forteroche</h1></a>
		</div>
		<img src="" alt="" />
		<div>
			<button class="btn btn-dark" data-toggle="modal" data-target="#login-form"><i class="fab fa-keycdn"></i></button>
			<!-- Modal -->
			<div id="login-form" class="modal fade" role="dialog">
				<div class="modal-dialog">
			    	<!-- Modal content-->
			    	<div class="modal-content content">
		      			<form action="index.php?action=showDashboard" method="POST">
				      		<div class="modal-header">
						      	<h4 class="modal-title">Connexion</h4>
						        <button type="button" class="close close-btn" data-dismiss="modal">&times;</button>
				        	</div>
				    		<div class="modal-body">
			    				<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" />
						    
								<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Mot de passe" />
							</div>		  		
				      		<div class="modal-footer">
				        		<button class="btn btn-dark" type="submit">Se connecter</button>
				      		</div>
			      		</form>
					</div>
		    	</div>
			</div>
		</div>
	</footer>
