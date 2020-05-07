<?php
require_once 'src/Model/UtilisateurManager.php';
require_once 'src/Model/Utilisateur.php';
/*
function connexionAction($post)
{
    $utilisateurManager  = new UtilisateurManager();
    $error               = 'erreur';

    if (isset($post['username']) and !empty($post['username'])) {
        $username        = htmlspecialchars($post['username']);
        $user            = $utilisateurManager->CheckUserlogin($username);
        if ($user) {
            $access  = password_verify($post['password'], $user->mot_passe);
            if ($access) {
                $_SESSION['admin_user'] = $user;
                header('location:Templates/Backend/dashboard.html.php');
            } else {
                $error = 'Mauvais utilisateur';
            }
        } else {
            $error  = 'Mauvais password';
        }
    } else {
        $page           = [
            'title'         => 'P4 JEAN Forteroche - Connexion',
            'page'          => 'connexion',
            'error'         => $error
        ];
    }
    include_once __DIR__ . '/../../Templates/Frontend/login.html.php';
}
*/
function logoutAction()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location:index.php");
    exit;
}

function loginAction($post)
{
    if (isset($_SESSION['admin_user'])) {
    
        header('location:index.php?action=dashboard');
        exit;
    } else {
        $utilisateurManager  = new UtilisateurManager();
        $error               = 'erreur';

        if (isset($post['username']) and !empty($post['username'])) {
            $username        = htmlspecialchars($post['username']);
            $user            = $utilisateurManager->CheckUserlogin($username);
            if ($user) {
                $access  = password_verify($post['password'], $user->mot_passe);
                if ($access) {
                    $_SESSION['admin_user'] = $user;
                    header('location:index.php?action=dashboard');
                    exit;
                } else {
                    $error = 'Mauvais utilisateur';
                }
            } else {
                $error  = 'Mauvais password';
            }
        } else {
            $page           = [
                'title'         => 'P4 JEAN Forteroche - Connexion',
                'page'          => 'connexion',
                'error'         => $error
            ];
        }
        include_once __DIR__ . '/../../Templates/Frontend/login.html.php';
    }
}
