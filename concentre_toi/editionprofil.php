<?php
session_start();// on demarre notre session
 
require_once('connex_bdd.php');// j'accede accede a la bdd
 
if(isset($_SESSION['id'])) {//je verifie l id 
   $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE id = ?");//je prepare ma requete (sql)
   $requser->execute(array($_SESSION['id']));// jexecute ma requette (sql)
   $user = $requser->fetch(); //je recherche le resultat ma requete
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {//je verifie new pseudo si il est diferrent du precedent
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE utilisateur SET username = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE utilisateur SET email = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = password_hash($_POST['newmdp1'], PASSWORD_BCRYPT);
 
      if($_POST['newmdp1'] == $_POST['mdp2']) {
         $insertmdp = $bdd->prepare("UPDATE utilisateur SET mot_passe = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/style.css">
      <title>Edition de Profil</title>
   </head>
   <body>
      <div align="center" class="form_connexion">
         <h2>Edition de mon profil</h2>
         <div align="center">
            <form method="POST" action="" enctype="multipart/form-data">
               <label>Pseudo :</label>
               <input type="text" name="newpseudo" placeholder="Pseudo" value="" /><br /><br />
               <label>Mail :</label>
               <input type="text" name="newmail" placeholder="Mail" value="" /><br /><br />
               <label>Mot de passe :</label>
               <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
               <label>Confirmation - mot de passe :</label>
               <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               <input type="submit" value="Mettre à jour mon profil !" />
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}
?>