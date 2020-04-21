<p>Derniers chapitres du roman :</p>

<?php
require('connex_bdd.php');
// On récupère les 4derniers billets
$req = $bdd->query('SELECT id, titre, contenu, publication, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM chapitre ORDER BY date_creation DESC LIMIT 0, 4');

while ($donnees = $req->fetch()) {
    ?>
    <div class="actualite">
        <h3>
            <?php echo htmlspecialchars($donnees['titre']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
                // On affiche le contenu du billet
                echo nl2br(htmlspecialchars($donnees['contenu']));
                ?>
            <br />
            <em><a href="commentaires.php?chapitre=<?php echo $donnees['id']; ?>">Commentaires</a></em>
        </p>
    </div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>