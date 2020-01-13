<?php $title = htmlspecialchars('Jean Forteroche, Bilet simple pour l\'Alaska'); ?>

<?php ob_start(); ?>

   		<?php include('header.php'); ?>
	
		<div id="about">
	    	<h2>Le livre d'une autre façon</h2>
	    	<p>J'ai décidé de vous faire découvrir mon nouveau livre "Billet simple pour l'Alaska" d'une manière inédite. 
	    	C'est sous forme d'article que vous découvrirez les chapitres au fil de l'écriture. <br /> Votre avis compte pour moi, n'hésitez pas à me donner votre avis et qui sait, cela changera peut être le cours de l'histoire...</p>
		</div>
	</div>
<div class=" book-banner">
	<div class="col-sm-6 offset-md-3 d-flex align-items-center justify-content-center"> 
			<h2 class="book-title">Billet simple pour l'Alaska</h2>
		</div>
		<div class="col-sm-2 d-flex align-items-end justify-content-center">
	    	<a class="btn btn-dark" href="index.php?action=listPosts">Lire le dernier chapitre</a>
		</div> 
</div>
	
	

	<div class="container">
		<div class="">
			<div id="book-summary">
		    	<h2>Synopsis</h2>
		    	<p>L'histoire débute dans la petite ville de. C'est ici que est née et qu'elle croyait finir sa vie. Mais le destin en a voulu autrement. Ou alors était-ce sa propre volonté ? <br />
		    	Suivez le voyage spirituel de en Alaska et suivez son évolution personnelle au cours de son voyage. </p>
			</div>

			<div id="chapters">
		    	<a class="btn btn-dark" href="index.php?action=listPosts">Voir les chapitres</a>
			</div>
		</div>
	</div>
	
	


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

