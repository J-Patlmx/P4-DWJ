<h1>Jean Forteroche !</h1>
<p><a href="index.php">Retour à l'accueil</a></p>


<article class="aperçu_chapitre">
    <h2>
        <?= $chapitre->titre; ?>
    </h2>
    <span>
        <?= $chapitre->date_creation; ?>
    </span>
    <div>
        <p>
            <?= $chapitre->contenu; ?>
        </p>
    </div>
</article>


<h2 id="commentairetitre">Commentaires</h2>
<form class="form_commentaire" id="newcomment" action="index.php?action=addCommentaire&id=<?= $chapitre->id ?>" method="post">
    <div>
        <label for="pseudo">Auteur</label>
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="contenu_commentaire">commentaire</label>
        <textarea id="contenu_commentaire" name="contenu_commentaire"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<div id="commentairesurchapitre">
        <?php
        foreach ($commentaires as $commentaire) {
            ?>
           <div class="element"><strong><?php echo htmlspecialchars($commentaire['pseudo']); ?></strong><strong id="datestyle"> le <?php echo $commentaire['date_commentaire']; ?></strong></div>
                  <div class="element"><?php echo nl2br(htmlspecialchars($commentaire['contenu_commentaire'])); ?></div>
                    <button>
                     <a class="element" href="index.php?action=signalerUnCommentaire&id=<?= $commentaire['id'] ?>"><i class="fas fa-thumbs-down"></i></a>
                    </button> <br />
        <?php
        } // Fin de la boucle des commentaires
         ?> 
    </div> <br />