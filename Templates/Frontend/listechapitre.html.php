<p>Derniers chapitres du roman :</p>
<?php
if (isset($_SESSION['admin_user'])){
    echo ' retour au bureau';
}
    foreach ($data['listechapitre'] as $donnees) {
        ?>
        <div class="derniereParution">
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
                <em><a href="?action=chapitre&id=<?php echo $donnees['id']; ?>">Lire la suite</a></em>
            </p>
        </div>
<?php
    } // Fin de la boucle des billets
