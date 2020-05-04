<?php 
require_once 'src/Controller/ChapitreController.php';
require_once 'src/Controller/ConnexionController.php';

var_dump($_GET);

if(isset($_GET['action']))
{
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

        case 'connexion': 
        $connexion = 1;
            var_dump($connexion);

            if(isset($_GET[$connexion]))
            {
                $connexion = $_GET['connexion'];
            }
            connexionAction();
        break;

        default:
            homePageAction();
    }
}
else
{
    homePageAction();
}

/*
function my_autoloader($class)
{
    require_once 'src/Model/' . $class . '.php';
}

spl_autoload_register('my_autoloader');
$request = explode('-', $_GET['page']);
$pageController = 'src/Controller/' . ucfirst($request[0]) . 'Controller.php';
if (file_exists($pageController)) {
   
    require_once $pageController;
} else {
    echo $pageController;
    include '404.php';
}
die(); */
