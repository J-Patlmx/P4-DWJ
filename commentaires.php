<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>P4</title>
    </head>

    <body>
        <h1>Jean Forteroche !</h1>
        <p><a href="index.php">Retour à l'accueil</a></p>

        <?php
        // Connexion à la base de données
        require_once('connex_bdd.php');

        // Récupération du billet
        $req = $bdd->query('SELECT id, titre, contenu, publication, 
                                    DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') 
                                    AS date_creation_fr 
                                    FROM chapitre 
                                    ORDER BY date_creation 
                                    DESC LIMIT 0, 10');
        $req->execute(array($_GET['chapitre']));
        $donnees = $req->fetch();
        ?>

        <div class="aperçu_chapitre">
            <h3>
                <?php echo htmlspecialchars($donnees['titre']); ?>
                <em>le <?php echo $donnees['date_creation_fr']; ?></em>
            </h3>
            <p>
                <?php echo htmlspecialchars($donnees['titre']); ?> le <?php echo $donnees['contenu']; ?>
                <?php echo nl2br(htmlspecialchars($donnees['date_creation_fr'])); ?></p>

        </div>


        <h2>Commentaires</h2>
        <?php
        $req->closeCursor(); // on libère le curseur pour la prochaine requête


        // Récupération des commentaires
        $req = $bdd->prepare('SELECT id, id_chapitre, contenu_commentaire, pseudo, signaler,
                                    DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') 
                                    AS date_commentaire_fr 
                                    FROM commentaire 
                                    WHERE id_chapitre = ? 
                                    ORDER BY date_commentaire');
        $req->execute(array($_GET['chapitre']));

        while ($donnees = $req->fetch()) {
            ?>
            <div class="com">
                <p><strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong><strong id="datecom"> le <?php echo $donnees['date_commentaire_fr']; ?></strong></p>
                <p><?php echo nl2br(htmlspecialchars($donnees['contenu_commentaire'])); ?></p>
                <p><i type="submit" class="signalercom fas fa-thumbs-down"></i></p>

                <br />
            </div>
        <?php
        } // Fin de la boucle des commentaires
        $req->closeCursor(); // on libère le curseur pour la prochaine requête
        ?>
        <form method="POST" action="" class="form_commentaire">
            <label>Pseudo :</label>
            <input type="text" name="pseudo" placeholder="Pseudo" value="" /><br /><br />
            <label> Votre commentaire :</label>
            <input id="tailleinput" type="text"  name="votrecommentaire" placeholder="" value="" /><br /><br />
            <input type="submit" value="commentez !" />
        </form>

        <footer>
            <?php include('footer.php'); // inclusion de footer.php 
            ?>
        </footer>
    </body>

</html>