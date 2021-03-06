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
                    post($id);
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
                        require('view/frontend/error.php');
                    }
                }
                else {
                    throw new Exception('L\'identifiant de billet n\'existe pas.');
                }
                break;

            case 'flagComment' :
                if (isset ($_GET['postId']) && isset ($_GET['commentId'])) {
                    flagComment($_GET['commentId'], $_GET['postId']);
                    echo 'commentaire signalé!';
                }
                break;

            //BACKEND
            case 'adminLogsIn' :
                session_start();
                if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
                     adminLogsIn();    
                }
                else {
                   showDashboard($_SESSION['email'], $_SESSION['password']);
                }
                break;

            case 'showDashboard' :
                session_start();     
                if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
                    if (isset($_POST['password']) && $_POST['password'] == 'admin'){
                         showDashboard($_POST['email'], $_POST['password']);  
                    }
                    else {
                         require('view/frontend/authorisationView.php');
                    }
                }
                elseif (isset($_SESSION['email']) && (isset($_SESSION['password']))) {
                    showDashboard($_SESSION['email'], $_SESSION['password']);    
                }
                else {
                    throw new Exception('Vous n\'êtes pas autorisé à accéder à cette page');
                    header('Location: index.php');
                }
                break;

            case 'validateComment' :
                    if (isset ($_GET['commentId'])) {
                        validateComment($_GET['commentId']);
                    }
                    else {
                    throw new Exception('L\'identifiant de billet n\'existe pas.');
                }
                break;

            case 'rejectComment' :
                if (isset ($_GET['commentId'])) {
                        rejectComment($_GET['commentId']);
                    }
                    else {
                    throw new Exception('L\'identifiant de billet n\'existe pas.');
                }
                break;

            case 'addPost' :
                addPost();
                break;

            case 'publishPost' :
                if (!empty ($_POST['title']) && !empty($_POST['content'])) {
                    publishPost($_POST['title'], $_POST['content']);
                } else {
                    require('view/backend/error.php');
                    throw new Exception('Veuillez écrire l\'article avant de l\'envoyer.');   
                }
                break;

            case 'getPostToEdit':
                getPostToEdit($_GET['id']);
                break;

            case 'updatePost' :
                if (!empty ($_POST['title']) && !empty($_POST['content'])) {
                    updatePost($_GET['postId'], $_POST['title'], $_POST['content']);
                }
                else {
                    require('view/backend/error.php');
                    throw new Exception('Veuillez écrire l\'article avant de l\'envoyer.');   
                }
                break;
            
            case 'deletePost' :
                if(isset($_GET['postId'])) {
                  deletePost($_GET['postId']); 
                } else {
                  throw new Exception('L\'article n\'a pas été supprimé');
                }
                break;

            case 'getAllPosts':
                getAllPosts();
                break;

            case 'getAllComments' :
                getAllComments();
                break;

            case 'adminLogsOut' :
                adminLogsOut();
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


