<?php
session_start(); // on demarre notre session
require_once('connex_bdd.php'); // connexion a la base de donnee via mon include
if (isset($_POST['connexionadmin'])) //on verifie si le formulaire a bien etait rempli 
{
    $pseudoconnect = htmlspecialchars($_POST['pseudo']); // on cree notre  varaible pseudoconnect et on la securise avec htmlspecialchars
    // bcrypt plutot que sha1
    $mdpconnect = sha1($_POST['mdpconnect']); // on cree notre variable mdpconnect et securise le mot de passe avec un type sha1
    if (!empty($pseudoconnect) and (!empty($mdpconnect))) // si pseudoconnect et mdpconnect sont different de vide alors
    {
        $requser = $bdd->prepare("SELECT * FROM utilisateur  WHERE username = ? AND mot_passe = ?"); //on prepare notre requette user (sql)
        $requser->execute(array($pseudoconnect, $mdpconnect)); //puis on execute notre requette user(sql)
        $userexist = $requser->rowCount(); // enfin on verifie combien de ligne existe avec les id rentrer
        if ($userexist == 1) // si le user est egal a 1 alors
        {
            $userinfo = $requser->fetch(); //on cherche les info du user id + pseudo
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['username'];
            header("location:profil.php?id=" . $_SESSION['id']); //on passe dans l url la page a afficher en fonction de l id du user 
        } else {
            $erreur = "Mauvais pseudo ou mot de passe ! ";
        }
    } else {
        $erreur = 'tout les champs doivent êtres complétés';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>connexion admin</title>
</head>

<body>
    <h1>CONNEXION ADMINISTRATEUR</h1>
    <h2 id="h2forminscription">votre compte administrateur</h2>
    <div align="center" class="form_connexion">
        <br /><br />
<img src="avatar.png" alt="avatar">

        <form method="POST" action="">
            <label for="pseudo">Pseudo :</label>
            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="" />


            <label  for="mdp">Mot de passe :</label>
            <input  type="password" placeholder="Votre mot de passe" id="mdp" name="mdpconnect" value="" />

            <input  type="submit" name="connexionadmin" value="Connexion" />
        </form>

<p id="racolage"> Pas encore inscrit ?? <br />
<a href="inscription.php"> inscrit toi !</a>
</p>

        <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>"; // si une erreur et existant l afficher en rouge pour meilleur visibiliter
        }
        ?>
    </div>
    
    <footer>
        <?php include('footer.php') // footer ajouter grace a include 
        ?>
        <footer>
</body>

</html>