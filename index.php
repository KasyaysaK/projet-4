<?php
require('controller/frontend.php');
require('controller/backend.php');

try {

    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }

        elseif ($_GET['action'] == 'post') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('La page demandée n\'existe pas.');
            }

        }

        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            else {
                throw new Exception('La page demandée n\'existe pas.');
            }
        }

        elseif ($_GET['action'] == 'showDashboard') {
            showDashboard($_POST['email'], $_POST['password']);   
        }
        elseif ($_GET['action'] == 'createPost') {
                createPost();
                var_dump('coucou depuis le routeur');
            }
        elseif ($_GET['action'] == 'publishPost') {
            showDashboard($_POST['email'], $_POST['password']);   
        }
        elseif ($_GET['action'] == 'deletePost') {
            showDashboard($_POST['email'], $_POST['password']);   
        }   
            else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cette page');
            }

    }
    else {
        listPosts();
    }
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
}


