<div class="container">
	<div class=" d-flex align-items-center justify-content-center mb-2">
		<a class="nav-link" href="index.php"><h1 class="name">Jean Forteroche</h1></a>
	</div>
</div>

<div class="row d-flex align-items-center book-banner">
	<div class="col-sm-6 offset-md-3 d-flex align-items-center justify-content-center"> 
		<h2 class="book-title mb-5">Billet simple pour l'Alaska</h2>
	</div>
	<div class="col-sm-2 d-flex align-items-end justify-content-center chapters">
		<ul>
			<?php foreach ($posts as $post): ?>
			<li><a class="zoom" href="index.php?action=post&amp;id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']); ?></a></li>
			<?php endforeach;?>
		</ul>
	</div> 
</div>


	
