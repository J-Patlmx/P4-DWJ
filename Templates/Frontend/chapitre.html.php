<h1>Jean Forteroche !</h1>

        <p><a href="index.php?action=adminSignaler" title="retour au bureau">Tous les Chapitres</a></p>


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



<form class="form-horizontal formCommentaire" id="newcomment" action="index.php?action=addCommentaire&id=<?= $data['chapitre']->id ?>" method="post">
<fieldset>
<!-- Nom du Formulaire -->
<legend>Laissez votre commentaire !</legend>

<!-- Text input Pseudo-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pseudo">Auteur</label>  
  <div class="col-md-4">
  <input id="pseudo" name="pseudo" type="text"  class="form-control input-md">
    
  </div>
</div>

<!-- Textarea Contenu Commentaire-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Commentaire</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="contenu_commentaire" name="contenu_commentaire"></textarea>
  </div>
</div>

<!-- Input Valider -->
<div>
    <input id="inputCommentaire" type="submit" />
</div>

</fieldset>
</form>