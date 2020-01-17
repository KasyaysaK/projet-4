<?php
  if (!isset($_SESSION)) {
    session_start();
  }
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Jean Forteroche <i class="fas fa-home"></i></button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="index.php"> Voir le site</a>
      <a class="dropdown-item" href="index.php?action=showDashboard"> Voir le gestionnaire </a>
      <a class="dropdown-item" href="index.php?action=adminLogsOut">Se déconnecter</a>
    </div>  
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=addPost">Nouveau <i class="fas fa-plus-square"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=getAllPosts">Billets <i class="fab fa-readme"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=getAllComments">Commentaires <i class="fas fa-comments"></i></a>
      </li>
    </ul>
  </div>
</nav>