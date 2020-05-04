<?php
require_once('src/Model/Model.php');
function inscriptionController($pseudo, $mail, $mdp)
{
    if (strlen($pseudo) <= 255) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            if (issetUserModel($mail)) {
                insertUserModel($pseudo, $mdp, $mail);
                return 'Vous pouvez vous connecter !';
            } else {
                return 'Mail déjâ utiliser !';
            }
        } else {
            return 'Vos adresses mail ne correspondent pas !';
        }
    } else {
        return 'Votre pseudo ne doit pas dépasser 255 caractères !';
    }
}


