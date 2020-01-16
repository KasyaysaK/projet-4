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
    }
}

function flagComment($commentId)
{
    $commentManager = new CommentManager();
    $flaggedComment = $commentManager->flagComment($commentId);

    if ($flaggedComment === false) {
        throw new Exception('Commentaire non signalé');
        echo 'Le commentaire n\'a pas pu être signalé.';   
    }
    else {
        echo 'commentaire signalé';
        header('Location: index.php?action=comment&id=' . $commentId);
    }
}