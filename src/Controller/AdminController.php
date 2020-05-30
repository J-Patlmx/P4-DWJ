<?php
require_once 'src/Model/Utilisateur.php';
require_once 'src/Model/ChapitreManager.php';
require_once 'src/Model/CommentaireManager.php';
require_once 'src/View/View.php';
function dashboardAction()
{
    if (isset($_SESSION['admin_user'])) {
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
    } else {
        header('location: index.php?action=login');
        exit;
    }
}
function dashboardBilletAction()
{
    if (isset($_SESSION['admin_user'])) {
        $chapitreManager    = new ChapitreManager();
        $result = $chapitreManager->findAllAdminBillet();
        include_once __DIR__ . '/../../Templates/Backend/adminBillet.html.php';
    } else {
        header('location: index.php?action=login');
        exit;
    }
}
/*--------------------------- Liste COMMENTAIRE SIGNALER ----------------------------------------*/
function dashboardCommentaireAction()
{
    if (isset($_SESSION['admin_user'])) {
        $adminCommentaireSignaler    = new CommentaireManager();
        $commentaires = $adminCommentaireSignaler->findAllCommentaireSignaler();
        include_once __DIR__ . '/../../Templates/Backend/adminSignaler.html.php';
    } else {
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

/*----------------------chapitre CRUD ---------------------------*/
function dashboardChapitreAction($id)
{
    if (isset($_SESSION['admin_user'])) {
        $adminChapitre    = new ChapitreManager();
        $chapitre = $adminChapitre->Chapitre($id);
        include_once __DIR__ . '/../../Templates/Backend/adminBillet.html.php';
    } else {
        header('location: index.php?action=adminBillet');
        exit;
    }
}


function addChapitreAction($post)
{

    if (empty($post)) {
        include_once __DIR__ . '/../../Templates/Backend/addChapitre.html.php';
    } else { {

            if (
                isset($post['titre']) && !empty($post['titre'])
                && isset($post['contenu']) && !empty($post['contenu'])
            ) {

                //on netoie les donees envoyer
                $titre = strip_tags($post['titre']);
                $contenu = strip_tags($post['contenu']);


                $_SESSION['message'] = "votre chapitre est ajouté!";

                $addChapitre   = new ChapitreManager();

                $result = $addChapitre->addChapitre($titre, $contenu);
                var_dump($post);
                var_dump('article creer !');
                header('location: index.php?action=adminBillet');
                exit;
            } else {

                $_SESSION['erreur'] = " Formulaire incomplet !";
                header('location: index.php?action=addNewChapitre');
                exit;
            }
        }
    }
}


function deleteChapitreAction($id)
{
    $delChapitre    = new ChapitreManager();
    $chapitre = $delChapitre->deleteChapitre($id);
    header('location: index.php?action=adminBillet');
    exit;
}

function updateChapitreAction($post)
{

    if (empty($post)) {
        include_once __DIR__ . '/../../Templates/Backend/updateChapitre.html.php';
    } else { {

            if (isset($_GET['id']) && !empty($_GET['id'])
                && isset($post['titre']) && !empty($post['titre'])
                && isset($post['contenu']) && !empty($post['contenu'])
            ) {

                //on netoie les donees envoyer
                $id = strip_tags($_GET['id']);
                $titre = strip_tags($post['titre']);
                $contenu = strip_tags($post['contenu']);
                $_SESSION['message'] = "votre chapitre est ajouté!";

                $updateChapitre   = new ChapitreManager();
                $result = $updateChapitre->updapteChapitre($id, $titre, $contenu);

                var_dump($post);
                var_dump('article modifier !');
                header('location: index.php?action=adminBillet');
                exit;
            } else {

                $_SESSION['erreur'] = " Formulaire incomplet !";
                header('location: index.php?action=updateChapitre');
                exit;
            }
        }
    }
}

function publierChapitreAction($id)
{
    $publierUnChapitre = new ChapitreManager();
    $chapitre = $publierUnChapitre->getUnique($id);

    $publierUnChapitre->publierChapitre($id, $chapitre->publication === "1" ? "0" : "1");
    header('location:index.php?action=adminBillet');
    exit;
}
