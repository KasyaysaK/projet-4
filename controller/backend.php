<?php

require_once('model/AdminManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function showDashboard($email, $password)
{
    $adminManager = new AdminManager();
    $adminLogsIn = $adminManager->adminSignin($email, $password);
    var_dump('$adminLogsIn');
    

    if ($adminLogsIn) {
		$hash = password_hash($password, PASSWORD_DEFAULT);

        if(filter_var($email, FILTER_VALIDATE_EMAIL) && password_verify('admin', $hash)) {
        	listContent();
            require('view/backend/dashboardView.php');
        }
        else {
            throw new Exception('Vous n\'êtes pas autorisé à consulter cette page');
        }
    }
    else {
        throw new Exception('Tous les champs ne sont pas remplis');
     } 
 }

function listContent()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments();


    require('view/backend/dashboardView.php');
}

function createPost() 
{
    var_dump('createPost backend');
    $postManager = new PostManager();
    $newPost =  $postManager->addPost();

    require('view/backend/createView.php');
}

//function readPost() {}

//function updatePost() {}

function deletePost($postId, $commentId) 
{
    $postManager = new PostManager();
    $deletePost = $postManager->deletePost($postId, $commentId);
} 

function getFlaggedComments()
{
    $commentManager = new CommentManager();
	$getFlaggedComments = $commentManager->flaggedComments();
}

//function updateFlaggedComment() {}

//function deleteFlaggeComment() {}