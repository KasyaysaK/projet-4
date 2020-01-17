<?php

require_once('model/AdminManager.php');
require_once('model/HomepageManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function adminLogsIn() 
{
    require('view/frontend/login.php');
}

function showDashboard($email, $password)
{
        $adminManager = new AdminManager();
        $adminLogsIn = $adminManager->adminSignin($email, $password);

        if ($adminLogsIn) {
            $_SESSION['email'] = filter_var($email, FILTER_VALIDATE_EMAIL);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $_SESSION['password'] = password_verify('admin', $hash);
                listContent();
            }
            else {
                require('view/frontend/login.php');
                echo 'Identifiant ou mot de passe erroné';
            }   
    }

function adminLogsOut() {
    session_start();
    session_destroy();

    header('Location: index.php');
    exit;
}

function addPost() 
{
    require('view/backend/createView.php');
}
function publishPost($title, $content)
{
    $postManager = new PostManager();
    $postCreated = $postManager->createPost($title, $content);

    if ($postCreated === false) {
        var_dump('erreur depuis le backend');
        throw new Exception('Impossible d\'ajouter le chapitre');
    }
    else {
        var_dump('post crée depuis le backend');
        header('Location: index.php?action=showDashboard');
        exit;
    }header('Location: index.php?action=showDashboard');
        exit;
}

function getAllPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/backend/postsView.php');
}

function getAllComments()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments();

    require('view/backend/commentsView.php');
}

function listContent()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    $commentManager = new CommentManager();
    $comments = $commentManager->getFlaggedComments();

    require('view/backend/dashboardView.php');
}

function getPostToEdit($id) 
{
    $postManager = new PostManager();
    $postToEdit = $postManager->getPost($id);

    require('view/backend/updateView.php');
}

function updatePost($id, $title, $content)
{
    $postManager = new PostManager();
    $postUpdated = $postManager->editPost($id, $title, $content);

    if ($postUpdated === false) {
        echo 'Impossible de mettre à jour le chapitre';
    }
    else {
        header('Location: index.php?action=showDashboard');
        exit;
    }
}


function deletePost($id) 
{
    $postManager = new PostManager();
    $deletedPost = $postManager->erasePost($id);

    listContent();
} 

function getFlaggedComments()
{
    $commentManager = new CommentManager();
	$getFlaggedComments = $commentManager->flaggedComments();
}

function validateComment($commentId) {
    $commentManager = new CommentManager();
    $validatedComment = $commentManager->validateComment($commentId);

    listContent();
}

function rejectComment($commentId) {
    $commentManager = new CommentManager();
    $rejectedComment = $commentManager->rejectComment($commentId);

    listContent();
}

