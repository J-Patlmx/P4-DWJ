TODO:

05/06/2020: modification de l esthetique ajout dun menu de navigation admin avec isset admin users pour l affichage selon connecter ou pas

27/05  reste a ajouter tiny mce a mon crud, la fonction edition dun chapitre, 

           

    faire de la factorisation du style.css 
        

            Backend.style.css
            Frontend.style.css

    

    FACTORISATION DU CSS -> Back.style.css creer +factorisation du style.css avant de devenir Front.style.css



installer composer 

requette 
composer req --dev  filp/whoops


dans index.php => require_once '../vendor/autoload.php';


juste en dessous des requires 
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register(); 



