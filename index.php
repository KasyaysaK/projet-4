<?php
require('controller/frontend.php');
require('controller/backend.php');

            var_dump('bonjour');


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
            var_dump($_POST['email'], $_POST['password']);

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


