<?php 
include('connex_bdd.php');// connexion a la base de donnee via mon include
if(isset($_POST['forminscription']))//on verifie si le formulaire a bien etait rempli 
{ //si pseudo different de vide an si mail est diferent de vide et si mail2 different de vide si mdp different de vide si mdp2 different de vide 
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2'])AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
   {
        $pseudo = htmlspecialchars($_POST['pseudo']);// je declare ma variable pseudo avec la protection htmlspecialchars
        $mail = htmlspecialchars($_POST['mail']);// je declare ma variable mail avec la protection htmlspecialchars
        $mail2 = htmlspecialchars($_POST['mail2']);// je declare ma variable mail2 avec la protection htmlspecialchars
        $mdp = sha1($_POST['mdp']);// je declare ma variable mdp avec un hash de mdp de type sha1
        $mdp2 = sha1($_POST['mdp2']);// je declare ma variable mdp2 avec un hash de mdp de type sha1

        $pseudolength = strlen($pseudo);// longueur de mon pseudo + fonction strlen (calcul du nombre de carractere)

    if($pseudolength <= 255){// si la longueur de mon pseudo est inferieur ou egale a 255 caracteres  
                 if($mail == $mail2) {// si mail 1 es egal a mail 2 
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {// je filtre les mails avec la fonction filter_var et en je n'en prend q'une seul oje verifie egalement quil s'agit dun mail valide
                       $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");//je prepare ma requete(sql) de verification de mail
                       $reqmail->execute(array($mail));// j'execute ma requete de verification de mail existant
                       $mailexist = $reqmail->rowCount();// resultat de recherche requete  de verification de mail
                       if($mailexist == 0) {// si le mail nexiste pas alors 
                          if($mdp == $mdp2) {// on verifie si mdp est egale a mdp2
                            //je prepare ma requete(sql) d'insersion dun nouveau membre dans la base de donnees
                             $insertmbr = $bdd->prepare("INSERT INTO utilisateur(username, email, mot_passe) VALUES(?, ?, ?)");
                             //j'execute ma requete (sql) et donc j insere un nouveau membre dans la base de donees(bdd)
                             $insertmbr->execute(array($pseudo, $mail, $mdp));
                                $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";// jindique a lutilisateur que son compte est bien cree
                          } else {
                             $erreur = "Vos mots de passes ne correspondent pas !";// gestion d'erreur motss de passe non identiques
                          }
                       } else {
                          $erreur = "Adresse mail déjà utilisée !";// gestion d'erreur d'adresse maill deja utiliser
                       }
                    } else {
                       $erreur = "Votre adresse mail n'est pas valide !";// gestion d'erreur mail non valide
                    }
                 } else {
                    $erreur = "Vos adresses mail ne correspondent pas !";// gestion d'erreur mail non identique a sa confirmation
                 }
              } else {
                 $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";// gestion d'erreur  max 255 caracteres
              }
           } else {
              $erreur = "Tous les champs doivent être complétés !";// gestion d'erreur d'oublie de remplissage de champs
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