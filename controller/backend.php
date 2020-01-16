<?php

require_once('model/AdminManager.php');
require_once('model/HomepageManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

//function adminLogsIn() 
//{
//    if (isset($_SESSION['email']) && ($_SESSION['password'])) { 
//        require('view/backend/dashboardView.php');
//    } 
//    else {
//        require('view/frontend/authorisationView.php');
//    }
//}

function showDashboard($email, $password)
{
//    if (isset($_SESSION['email']) && ($_SESSION['password'])) { 
//        
//        listContent();
//    } 
//    else {
        var_dump('yo');
        session_start();
        $adminManager = new AdminManager();
        $adminLogsIn = $adminManager->adminSignin($email, $password);
        if ($adminLogsIn) {
                var_dump('logged in');

             $_SESSION['email'] = filter_var($email, FILTER_VALIDATE_EMAIL);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $_SESSION['password'] = password_verify('admin', $hash);
                listContent();
            }
            else {
                var_dump('not logged in');
                require('view/frontend/login.php');
            }
        
    }



function adminLogsOut() {
    var_dump($_SESSION);
    session_destroy();

    header('Location: index.php');
    exit;
}

function listContent()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments();

    require('view/backend/dashboardView.php');
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
       throw new Exception('Impossible d\'ajouter le chapitre');
    }
    else {
        require('view/backend/successView.php');
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
