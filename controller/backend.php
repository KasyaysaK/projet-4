<?php

require_once('model/AdminManager.php');

function showDashboard()
{
    $adminManager = new AdminManager();
    $adminLogsIn = $adminManager->adminSignin();
    
    $hash = '$2y$10$s9ZVOeP1SjkslQ12cUf3MO3FlIvtpH4pLWWoEObu0oblbg0TQY87C';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && password_verify('admin', hash)){
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