<?php
require_once 'src/Model/UtilisateurManager.php';
require_once 'src/Model/Utilisateur.php';
function connexionAction()
{
    $utilisateurManager  = new UtilisateurManager();
    $utilisateur         = new Utilisateur();
    $error               = false;

if (isset($_POST['username']) and !empty($_POST['username'])) 
{
    $username        = htmlspecialchars($_POST['username']);
    $user            = $utilisateurManager->CheckUserlogin($username);
    if ($user) {
        $access  = password_verify($_POST['password'], $user->mot_passe);
        if ($access) {
            $_SESSION['admin_user'] = $user;
        } else {
            $error = true;
        }
    } else {
        $error  = true;
    }
}

if (isset($_SESSION['admin_user'])) {
    $adminpofil           = [
        'title'         => 'P4 JEAN Forteroche - Page Administration',
        'page'          => 'adminprofil'

    ];
} else {
    $page           = [
        'title'         => 'P4 JEAN Forteroche - Connexion',
        'page'          => 'connexion',
        'error'         => $error
    ];
}


include_once __DIR__ . '/../../Templates/Frontend/connexion.php';

}



//TODO: verifier le formumlaire de connexion 
// lui passser la variable adminUser si les users info son bonne







        // $utilisateur = new utilisateur();
        // echo "<pre>"; 
        // $utilisateur->setEmail('');
        // $utilisateur->setMotPasse('');
        // $utilisateur->setUsername('');
        //  var_dump($utilisateur);
        // $manager = new utilisateurManager();
        // $manager->add($utilisateur);
