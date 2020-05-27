TODO:
27/05  reste a ajouter tiny mce a mon crud, la fonction edition dun chapitre, 
ainsi que la parti publication depublication dun chapitre (la partie estetique fonctionne)

            27/05  la fonction suppression fonctionne 
            27/05  la fonction delete  fonctionne 
            27/05 la partie estetique de la fonction publier fonctionne




EDIT  27/05 quand je signale un commentaire cela me renvoie vers mon chapitre 1 
header('location: index.php?action=chapitre . $idChapitre'); exit ne fonctionne pas 
header('location: index.php?action=chapitre?id= . $idChapitre'); exit ne fonctionne pas 
header('location: index.php?action=chapitre?id= . $id'); exit ne fonctionne pas 

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