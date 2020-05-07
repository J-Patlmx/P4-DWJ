<?php 
require_once 'src/Controller/ChapitreController.php';
require_once 'src/Controller/ConnexionController.php';
require_once 'src/Controller/AdminController.php';
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
            

            addCommentaireAction();
        break;

        case 'connexion':  // doit elle etre remplacer par loginAction ?
   
            var_dump('Route plus utiliser Connexion');

    
        break;
        
        case 'logout':
            

            
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

        case 'adminProfil': 
        var_dump(" Route admin profil");

        
        //dashboardAction();
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
