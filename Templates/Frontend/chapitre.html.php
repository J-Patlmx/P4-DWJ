<h1>Jean Forteroche !</h1>
<?php if (isset($_SESSION['admin_user'])) { ?>

        <p><a href="index.php?action=dashboard" title="retour au bureau"><i class="fas fa-igloo"></i></a></p>
    <?php } else { ?>
        <p><a href="index.php" title="retour a l'accueil">Retour à l'accueil</a></p>
    <?php } ?> 



<article class="aperçuChapitre">
    <h2>
        <?= $data['chapitre']->titre; ?>
    </h2>
    <span>
        <?= $data['chapitre']->date_creation; ?>
    </span>
    <div>
        <p>
            <?= $data['chapitre']->contenu; ?>
        </p>
    </div>
</article>

<div id="commentairesChapitre">
    <?php
    foreach ($data['commentaires'] as $commentaire) {
        ?>
        <div class="elementCommentaireChapitre"><strong><?php echo htmlspecialchars($commentaire['pseudo']); ?></strong><strong id="datestyle"> le <?php echo $commentaire['date_commentaire']; ?></strong></div>
        <div class="elementCommentaireChapitre"><?php echo nl2br(htmlspecialchars($commentaire['contenu_commentaire'])); ?></div>
        <div class="elementCommentaireChapitre">
            <a  href="index.php?action=signalerUnCommentaire&id=<?= $commentaire['id'] ?>&chapitreid=<?= $data['chapitre']->id ?>"><i class="fas fa-thumbs-down"></i></a>
        </div>
    <?php
    } // Fin de la boucle des commentaires
    ?>
    <br />
</div>

<h2 id="H2Commentaire">Commentaires</h2>
<form class="formCommentaire" id="newcomment" action="index.php?action=addCommentaire&id=<?= $data['chapitre']->id ?>" method="post">
    <div id="laissetoncommentaire">
        <div>
            <label for="pseudo">Auteur</label>
            <input type="text" id="pseudo" name="pseudo" />
        </div>
        <div>
            <label for="contenu_commentaire">commentaire</label>
            <textarea id="contenu_commentaire" name="contenu_commentaire" rows="10" cols="50"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </div>
</form>

