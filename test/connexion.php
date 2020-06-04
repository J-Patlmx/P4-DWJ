<?php
session_start(); // on demarre notre session
require_once 'src/Model/Database.php'; // connexion a la base de donnee via mon include
require_once 'src/Controller/ConnexionController.php';
//routeur
if (isset($_POST['connexionadmin'])) //on verifie si le formulaire a bien etait rempli 
{
    $pseudoconnect = htmlspecialchars($_POST['pseudo']); // on cree notre  varaible pseudoconnect et on la securise avec htmlspecialchars
    if (!empty($pseudoconnect)) // si pseudoconnect est different de vide alors
    // fin routeur a
    {
        //manager
        //function infoUser()
        $requser = getBdd()->prepare("SELECT id, username, mot_passe FROM utilisateur  WHERE username = ?"); //on prepare notre requette user (sql)
        $requser->execute(array($pseudoconnect)); //puis on execute notre requette user(sql)
    
        foreach ($requser->fetch() As $userinfo) {
            if (!empty($userinfo)) {
                $result = password_verify($_POST['mdpconnect'], $userinfo['mot_passe']);

                if ($result) // si le user est egal a 1 alors
                { //fin manager


                } else {
                    $erreur = "Mauvais pseudo ou mot de passe ! ";
                }
            } else {
                $erreur = 'L\'utilisateur n\'existe pas';
            }
        }
    } else {
        $erreur = 'tout les champs doivent êtres complétés';
    }
} //fin reel du routeur a apres gestion erreurs
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="public/css/style.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>connexion admin</title>
</head>

<body>
    <h1>CONNEXION ADMINISTRATEUR</h1>
    <h2 id="h2forminscription">votre compte administrateur</h2>
    <div align="center" class="form_connexion">
        <br /><br />
        <img src="public/images/avatar.png" alt="avatar">

        <form method="POST" action="">
            <label for="pseudo">Pseudo :</label>
            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="" />


            <label for="mdp">Mot de passe :</label>
            <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdpconnect" value="" />

            <input type="submit" name="connexionadmin" value="Connexion" />
        </form>

        <!-- <p id="racolage"> Pas encore inscrit ?? <br />
            <a href="inscription.php"> inscrit toi !</a>
        </p> -->

        <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>"; // si une erreur et existant l afficher en rouge pour meilleur visibiliter
        }
        ?>
    </div>

    <footer>
        <?php require_once 'Templates/Frontend/footer.php'; // footer ajouter grace a require once 
        ?>
        <footer>
</body>

</html>