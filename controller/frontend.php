<?php

require_once('model/HomepageManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function homepage()
{
    $homepageManager = new \JeanForteroche\Blog\Model\HomepageManager();
    $homepage = $homepageManager->showHome();

    require('view/frontend/homepageView.php');
}


function listPosts()
{
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \JeanForteroche\Blog\Model\PostManager();
    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
    $newComment = $commentManager->postComment($postId, $author, $comment);

    if ($newComment === false) {
       throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
        exit;
    }
}

function flagComment($commentId, $postId)
{
    $commentManager = new \JeanForteroche\Blog\Model\CommentManager();
    $flaggedComment = $commentManager->flaggedComment($commentId);

    if ($flaggedComment === 0) {
        throw new Exception('Commentaire non signalé');
        echo 'Le commentaire n\'a pas pu être signalé.';   
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}