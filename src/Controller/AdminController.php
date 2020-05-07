<?php
require_once 'src/Model/Utilisateur.php';
require_once 'src/Model/ChapitreManager.php';

function dashboardAction()
{
    if(isset($_SESSION['admin_user']))
    {
        $user = $_SESSION['admin_user'];
        include_once __DIR__ . '/../../Templates/Backend/dashboard.html.php';
    }
    else 
    {
        header('location: index.php?action=login');
        exit;
    }
}
function dashboardBilletAction()
{
    if(isset($_SESSION['admin_user']))
    {
        $chapitreManager    = new ChapitreManager();
        $result = $chapitreManager->findAllAdminBillet();
        include_once __DIR__ . '/../../Templates/Backend/adminBillet.html.php';
    }
    else 
    {
        header('location: index.php?action=login');
        exit;
    }
}

function dashboardCommentaireAction($id)
{
    if(isset($_SESSION['admin_user']))
    {
        $commentaireManager    = new CommentaireManager();
        $result = $commentaireManager->findAllAdminCommentaire($id);
        include_once __DIR__ . '/../../Templates/Backend/adminSignaler.html.php';
    }
    else 
    {
        header('location: index.php?action=dashboard');
        exit;
    }
}