<?php

require_once('model/HomepageManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function homepage()
{
    $homepageManager = new HomepageManager();
    $homepage = $homepageManager->showHome();

    require('view/frontend/homepageView.php');
}


function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
       throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
        exit;
    }
}

function flagComment($commentId, $postId)
{
    $commentManager = new CommentManager();
    $flaggedComment = $commentManager->flaggedComment($commentId);

    if ($flaggedComment === 0) {
        throw new Exception('Commentaire non signalé');
        echo 'Le commentaire n\'a pas pu être signalé.';   
    }
    else {
    var_dump('bonjour');  
        echo 'commentaire signalé';
        header('Location: index.php?action=post&id=' . $postId);
    }
}