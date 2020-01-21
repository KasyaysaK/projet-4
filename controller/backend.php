<?php

require_once('model/AdminManager.php');
require_once('model/CommentManager.php');
require_once('model/HomepageManager.php');
require_once('model/PostManager.php');

function adminLogsIn() 
{
    require('view/frontend/login.php');
}

function showDashboard($email, $password)
{
    $adminManager = new \JeanForteroche\Blog\Model\AdminManager();
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
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
    $postCreated = $postManager->createPost($title, $content);

    if ($postCreated === false) {
        throw new Exception('Impossible d\'ajouter le chapitre');
    }
    else {
        header('Location: index.php?action=showDashboard');
        exit;
    }
}

function getAllPosts()
{
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/backend/postsView.php');
}

function getAllComments()
{
    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getAllComments();

    require('view/backend/commentsView.php');
}

function listContent()
{
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
    $comments = $commentManager->getFlaggedComments();

    require('view/backend/dashboardView.php');
}

function getPostToEdit($id) 
{
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
    $postToEdit = $postManager->getPost($id);

    require('view/backend/updateView.php');
}

function updatePost($id, $title, $content)
{
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
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
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
    $deletedPost = $postManager->erasePost($id);

//    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
//    $deletedComment = $commentManager->eraseComment($postId);

    require('view/backend/deleteView.php');
} 

function validateComment($commentId) {
    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
    $validatedComment = $commentManager->validateComment($commentId);

    listContent();
}

function rejectComment($commentId) {
    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
    $rejectedComment = $commentManager->rejectComment($commentId);

    listContent();
}

