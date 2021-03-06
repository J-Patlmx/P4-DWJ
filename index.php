<?php
require_once 'src/Controller/ChapitreController.php';
require_once 'src/Controller/ConnexionController.php';
require_once 'src/Controller/AdminController.php';
require_once 'src/Controller/CommentaireController.php';
session_start();

if (isset($_GET['action'])) {
    var_dump($_GET['action']);
    switch ($_GET['action']) {
        case 'listechapitre':
            var_dump('afficher page liste chapitre');
            break;
            /*------------------------------------------------------------ FRONT OFFICE ------------------------------------------------------------*/
            /*---------- chapitre ----------*/
        case 'chapitre':
            $id = 1;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            chapitreAction($id);
            break;

            /*---------- Ajout de commentaire ----------*/
        case 'addCommentaire':
            var_dump('route de lajout de commentaire');

            if (isset($_GET['idChapitre']) && $_GET['idChapitre'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['contenu_commentaire'])) { }
            }
            addCommentaireAction($_GET['id'], $_POST['pseudo'], $_POST['contenu_commentaire']);
            break;

            /*---------- Signaler un Commentaire ----------*/
        case 'signalerUnCommentaire':
            var_dump(" Signaler un commentaire");

            signalerUnCommentaireAction($_GET['id']);
            break;
            /*------------------------------------------------------------ PARTIE CONNEXION ------------------------------------------------------------*/
            /*---------- Connexion ----------*/
        case 'login':
            var_dump('Route login');

            loginAction($_POST);
            break;

            /*---------- Deconnexion ----------*/
        case 'logout':
            var_dump('route de la deconnexion');

            logoutAction();
            break;

            /*------------------------------------------------------------ BACK OFFICE ------------------------------------------------------------*/
            /*---------- Dashboard ----------*/
        case 'dashboard':
            var_dump('Route dashboard');

            dashboardAction();
            break;

        case 'adminListeCommentaireSignaler':
            var_dump(" Route admin commentaire");

            dashboardCommentaireAction();
            break;

            /*------------------------------ Gestion COMMENTAIRE SIGNALER ------------------------------*/
            /*---------- Validation Commentaires Signaler ----------*/
        case 'adminValiderCommentaire':
            var_dump(" Route admin Billet");

            dashboardCommentaireValiderAction($_GET['id']);
            break;

            /*---------- Suppression Commentaires Signaler ----------*/
        case 'adminSupprimerCommentaire':
            var_dump(" Route admin Billet");

            dashboardCommentaireSupprimerAction($_GET['id']);
            break;

            /*---------- Gestion des Billets ----------*/
        case 'adminBillet':
            var_dump(" Route admin Billet");

            dashboardBilletAction();
            break;
/*------------------------------ Create Read Update Delete (crud) ------------------------------*/
            /*---------- Ajout de Chapitre ----------*/

        case 'addNewChapitre':
            var_dump(" Route addNewChapitre");
    
            AddChapitreAction($titre, $contenu);
            break;

            /*---------- Suppression de Chapitre ----------*/

        case 'deleteChapitre':
            var_dump('route de la suppression de chapitre');  
                
            deleteChapitreAction($_GET['id']);
            break;

            /*---------- Modification de Chapitre ----------*/

        case 'updatechapitre':
            var_dump('route de la modification de chapitre');

            dashboardUpdateChapitreAction();
            break;

             /*---------- Modification de Chapitre ----------*/

        case 'publishChapitre':
            var_dump('route de la publication de chapitre');

            dashboardPublishChapitreAction($_GET['id']);
            break;


        default:
            homePageAction();
    }
} else {
    homePageAction();
}
