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
                        throw new Exception('Tous les champs ne sont pas remplis');
                    }
                }
                else {
                    throw new Exception('L\'identifiant de billet n\'existe pas.');
                }
                break;

            //BACKEND
            case 'showDashboard' :
                if ($_GET['action'] == 'showDashboard') {
                    showDashboard($_POST['email'], $_POST['password']);   
                }
                else {
                    throw new Exception('Vous n\'êtes pas autorisé à accéder à cette page');
                }
                break;

            case 'createPost' :
                createPost();
                break;
            case 'publishPost' :
                showDashboard($_POST['email'], $_POST['password']);   
                break;

            case 'deletePost' :
                showDashboard($_POST['email'], $_POST['password']);   
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


