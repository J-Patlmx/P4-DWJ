<?php 
require_once 'src/Controller/ChapitreController.php';
require_once 'src/Controller/ConnexionController.php';
require_once 'src/Controller/AdminController.php';
require_once 'src/Controller/CommentaireController.php';
session_start();

if(isset($_GET['action']))
{
    var_dump($_GET['action']);
    switch($_GET['action']) 
    
    {
        case 'listechapitre': 
            var_dump('afficher page liste chapitre');
        break;

        case 'chapitre':
            $id = 1;
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
            chapitreAction($id);
        break;

        case 'addCommentaire':
            var_dump('route de lajout de commentaire');
            if (isset($_GET['id_chapitre']) && $_GET['id_chapitre'] > 0) 
            {
                if (!empty($_POST['pseudo']) && !empty($_POST['contenu_commentaire'])){} 
               
            }
            addCommentaireAction($_GET['id_chapitre'], $_POST['pseudo'], $_POST['contenu_commentaire']); 
        break;

        case 'logout':
            var_dump('route de la deconnexion');
            
           logoutAction();
        break;

        case 'login': 
            var_dump('Route login');
            
           loginAction($_POST);
        break;

        case 'dashboard': 
            var_dump('Route dashboard');
            
           dashboardAction();
        break;

        case 'adminBillet': 
            var_dump(" Route admin Billet");

            dashboardBilletAction();
        break;

        case 'adminSignaler': 
            var_dump(" Route admin commentaire");

            dashboardCommentaireAction($id);
        break;


        default:
            homePageAction();
    }
}
else
{
    homePageAction();
}
