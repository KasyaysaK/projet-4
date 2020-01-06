<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>
   	<?php include('header.php'); ?>
    
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
    			<h2 class=""></h2>
    			<p>Dernier chapitre publié :</p>
   
				    <?php
				    	while ($data = $posts -> fetch())
				    	{
				    ?>
					        <div class="">
					            <h3>
					                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']); ?></a> 
					            </h3>
					            
					            <p>
					                <?= nl2br(htmlspecialchars($data['content'])) ?>
					           
					            </p>
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

