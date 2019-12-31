<?php $title = htmlspecialchars('Jean Forteroche'); ?>

<?php ob_start(); ?>

    <h2>Billet simple pour l'Alaska</h2>
    <p>Dernier chapitre publié :</p>

    
    <?php
    	while ($data = $posts -> fetch())
    	{
    ?>
	        <div class="news">
	            <h3>
	                <?= htmlspecialchars($data['title']); ?> 
	            </h3>
	            
	            <p>
	                <?= nl2br(htmlspecialchars($data['content'])) ?>
	                <br />
	                <em><a href="postView.php">Commentaires</a></em>
	            </p>
	        </div>
    <?php
    	}
    	$posts -> closeCursor();
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('frontend/view/template.php'); ?>

