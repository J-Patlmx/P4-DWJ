<?php
require_once 'src/Model/Utilisateur.php';
require_once 'src/Model/ChapitreManager.php';
require_once 'src/Model/CommentaireManager.php';
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
/*--------------------------- Liste COMMENTAIRE SIGNALER ----------------------------------------*/
function dashboardCommentaireAction()
{
    if(isset($_SESSION['admin_user']))
    {
        $adminCommentaireSignaler    = new CommentaireManager();
        $commentaires = $adminCommentaireSignaler->findAllCommentaireSignaler();
        include_once __DIR__ . '/../../Templates/Backend/adminSignaler.html.php';
    }
    else 
    {
        header('location: index.php?action=dashboard');
        exit;
    }
}

function dashboardCommentaireValiderAction($id)
{
    $adminCommentaireSignaler    = new CommentaireManager();
    $commentaires = $adminCommentaireSignaler->validerCommentaire($id);
    header("location:index.php?action=adminListeCommentaireSignaler");
    exit;
}
function dashboardCommentaireSupprimerAction($id)
{
    $adminCommentaireSignaler    = new CommentaireManager();
    $commentaires = $adminCommentaireSignaler->supprimerCommentaire($id);
    header("location:index.php?action=adminListeCommentaireSignaler");
    exit;
}

/*function dashboardAfficherNombreCommentaireSignalerAction()
{
    $adminCommentaireSignaler    = new CommentaireManager();
    $result = $adminCommentaireSignaler->findAllCommentaireSignaler();
    header("location:index.php?action=adminAfficherNombreCommentaireSignaler");
    exit;
}*/