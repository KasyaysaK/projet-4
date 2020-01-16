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
        //session_start();
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
            }
        
    }


function adminLogsOut() {
    var_dump($_SESSION);
    session_start();
    session_destroy();

    header('Location: index.php');
    exit;
}

function listContent()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    $commentManager = new CommentManager();
    $comments = $commentManager->getFlaggedComments();

    require('view/backend/dashboardView.php');
}

function addPost() 
{
    require('view/backend/createView.php');
}
function publishPost($title, $content)
{
    var_dump('newpost');
    $postManager = new PostManager();
    $postCreated = $postManager->createPost($title, $content);

    if ($postCreated === false) {
        throw new Exception('Impossible d\'ajouter le chapitre');
    }
    else {
        header('Location: index.php?action=showDashboard');
        exit;
    }
}

//function readPost() {}

function getPostToEdit($id) 
{
    $postManager = new PostManager();
    $postToEdit = $postManager->getPost($id);

    require('view/backend/updateView.php');
}



function deletePost($postId, $commentId) 
{
    $postManager = new PostManager();
    $deletedPost = $postManager->erasePost($postId, $commentId);

    require('view/backend/dashboardView.php');
    
} 

function getFlaggedComments()
{
    $commentManager = new CommentManager();
	$getFlaggedComments = $commentManager->flaggedComments();
}

//function updateFlaggedComment() {}

//function deleteFlaggeComment() {}
