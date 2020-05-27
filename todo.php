TODO:
     resoudre mon probleme de crud 
            24/05 Toujours mon probleme d'utilisation de mon crud.

            la fonction suppression fonctionne desormer

    faire de la factorisation du style.css 
         commencer à separer la partie front du back en css

            Backend.style.css
            Frontend.style.css

    

installer composer 

requette 
composer req --dev  filp/whoops


dans index.php => require_once '../vendor/autoload.php';


juste en dessous des requires 
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register(); 