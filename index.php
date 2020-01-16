<?php

require('controller/frontend.php');
require('controller/backend.php');

try {

    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
            //FRONTEND
            case 'homepage':
                homepage();
                break;

            case 'listPosts':
                listPosts();
                break;

            case 'post' :
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }
                else {
                    throw new Exception('L\'identifiant de billet n\'existe pas.');
                }
                break;

            case 'addComment' : 
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    else {
                        echo 'le commentaire n\'a pas pu être ajouté';
                        throw new Exception('Tous les champs ne sont pas remplis');
                    }
                }
                else {
                    throw new Exception('L\'identifiant de billet n\'existe pas.');
                }
                break;

                case 'flagComment' :
                    if (isset ($_GET['author']) && isset ($_GET['comment'])) {
                            flaggedComment($_GET['commentId']);
                    }
                    break;

            //BACKEND
            case 'showDashboard' :
                session_start();
                
                if ($_GET['action'] == 'showDashboard') {
                    showDashboard($_POST['email'], $_POST['password']);   
                }
                else {
                    throw new Exception('Vous n\'êtes pas autorisé à accéder à cette page');
                    header('Location: index.php');
                }
                break;

            case 'showGestionnaire' : 
                session_start();
                if (isset($_SESSION['email']) && (isset($_SESSION['password']))) {
                    //vérifier email et mot de passe avec fonction

                    listContent(); 
                }
                var_dump($_SESSION['email']);
                var_dump('bonjour');
                break;

            case 'addPost' :
                addPost();
                break;
            case 'publishPost' :
                if (!empty ($_POST['title']) && !empty($_POST['content'])) {
                    publishPost(($_POST['title']), ($_POST['content']));
                } else {
                    throw new Exception('Veuillez écrire l\'article avant de l\'envoyer.');   
                }
                break;

            case 'getPostToEdit':
                getPostToEdit($_GET['id']);
                break;
 
            case 'deletePost' :
                if(isset($_GET['postId']) && isset($_GET['commentId']) && $_GET['postId'] > 0) {
                  deletePost($_GET['postId'], $_GET['commentId']); 

                require('view/backend/dashboardView.php');

                 
                } else {
                  throw new Exception('L\'article n\'a pas été supprimé');
                }
                break;
            
        }
    }
    else {
        homepage();
    }

}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
}


