<?php 
require_once('src/Controller/controller.php');

//Routeur
if(isset($_POST['forminscription']))
{ 
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2'])AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
   {  
      $pseudo = htmlspecialchars($_POST['pseudo']);// je declare ma variable pseudo avec la protection htmlspecialchars
      $mail = htmlspecialchars($_POST['mail']);// je declare ma variable mail avec la protection htmlspecialchars
      $mail2 = htmlspecialchars($_POST['mail2']);// je declare ma variable mail2 avec la protection htmlspecialchars
      $mdp = $_POST['mdp'];
      $mdp2 = $_POST['mdp2'];
      
      if($mail != $mail2) {
        $erreur = 'Vos mail ne sont pas indentiques';
      } else if($mdp != $mdp2) {
         $erreur = 'Vos mp ne sont pas indentiques';
      } 
      else{
         $erreur = inscriptionController($pseudo, $mail, $mdp);
      }
   }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Inscription</title>
</head>

<body>
    <h1>INSCRIPTION ADMINISTRATEUR</h1>
    <h2 id="h2forminscription">Créez votre compte administrateur</h2>
    <div align="center" class="form_inscription">
         <br /><br />
         <form method="POST" action="">
            <table id="tableauinscription">
               <tr>
                  <td id="tdlabel">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td id="tdinput">
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } // si pseudo est rempli alors on affiche le pseudo qui est egales a pseudo + html special chars?>" />
                  </td>
               </tr>
               <tr>
                  <td id="tdlabel">
                     <label for="mail">Mail :</label>
                  </td>
                  <td id="tdinput">
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; }  // si mail est rempli alors on affiche le mail qui est egales a mail + html special chars?>" />
                  </td>
               </tr>
               <tr>
                  <td id="tdlabel">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td id="tdinput">
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; }// si mail2 est rempli alors on affiche le mail2 qui est egales a mail2 + html special chars?>" />
                  </td>
               </tr>
               <tr>
                  <td id="tdlabel">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td id="tdinput">
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td id="tdlabel">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td id="tdinput">
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td id="tdinput">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";// si une erreur et existante je l affiche en rouge pour meilleur visibiliter
         }
         ?>
      </div>

        <footer>
            <?php include('footer.php') // footer ajouter grace a include ?>
        <footer>
</body>

</html>