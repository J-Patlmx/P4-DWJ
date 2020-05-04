<?php
require_once 'Database.php';
function issetUserModel($mail) {
   global $bdd;
   
    $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");//je prepare ma requete(sql) de verification de mail
   $reqmail->execute(array($mail));// j'execute ma requete de verification de mail existant

   return $reqmail->rowCount() == 0;
}

function insertUserModel($pseudo, $mdp, $mail) {
   global $bdd;
    $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
   $insertmbr = $bdd->prepare("INSERT INTO utilisateur(username, email, mot_passe) VALUES(?, ?, ?)");
   $insertmbr->execute(array($pseudo, $mail, $mdp));
} 
