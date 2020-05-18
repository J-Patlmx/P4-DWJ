<?php
require_once 'src/Model/Utilisateur.php';
require_once 'src/Model/ChapitreManager.php';
require_once 'src/Model/CommentaireManager.php';
require_once 'src/View/View.php';
function dashboardAction()
{
    if(isset($_SESSION['admin_user']))
    {
        $adminCommentaireSignaler    = new CommentaireManager();
        $result = $adminCommentaireSignaler->afficherNombreCommentaireSignaler();
        $user = $_SESSION['admin_user'];
        $data = [
            'title'         => 'P4 JEAN Forteroche - Liste Chapitre',
            'page'          => 'dashboard',
            'nbcommentairesignaler' => $result,
            'user' => $user
        ];
        $view = new View();
        $view->render('Backend', $data);
       // include_once __DIR__ . '/../../Templates/Backend/dashboard.html.php';
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


 function dashboardAddChapitreAction($titre, $contenu)
 {
    $addChapitre   = new ChapitreManager();
    $result = $addChapitre->dashboardAddChapitreAction($titre, $contenu);
  
    // header("location:index.php?action=addNewChapitre");
    // exit;
    
 }

function dashboardDeleteChapitreAction()
{

}

function dashboardUpdateChapitreAction()
{

}

function dashboardPublishChapitreAction()
{

}