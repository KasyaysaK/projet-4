<div class="container">
	<div class="row d-flex justify-content-between">
		<div>A propos</div>
		<div>Chapitres</div>
		<div>
			<button class="btn btn-dark" data-toggle="modal" data-target="#login-form"><i class="fab fa-keycdn"></i></button>
			<!-- Modal -->
			<div id="login-form" class="modal fade" role="dialog">
				<div class="modal-dialog">
			    	<!-- Modal content-->
			    	<div class="modal-content content">
		      			<form action="index.php?action=showDashboard">
				      		<div class="modal-header">
						      	<h4 class="modal-title">Connexion</h4>
						        <button type="button" class="close close-btn" data-dismiss="modal">&times;</button>
				        	</div>
				    		<div class="modal-body">
			    				<input type="email" class="form-control" id="inputEmail3" placeholder="Email" />
						    
								<input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe" />
							</div>		  		
				      		<div class="modal-footer">
				        		<button class="btn btn-dark" type="submit">Se connecter</button>
				      		</div>
			      		</form>
					</div>
		    	</div>
			</div>
		</div>
	</div>
