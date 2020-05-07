<h1>Jean Forteroche !</h1>
        <p><a href="index.php">Retour à l'accueil</a></p>


        <article class="aperçu_chapitre">
           <h2>
               <?= $chapitre->titre;?>
           </h2>
           <span>
           <?= $chapitre->date_creation;?>
           </span> 
           <div>
               <p>
               <?= $chapitre->contenu;?>
               </p>
           </div>
        </article>


        <h2 id="commentairetitre">Commentaires</h2>
        <form class="form_commentaire" id="newcomment" action="index.php?action=addcommentaire&amp;id=<?= $chapitre->id?>" method="post">
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
        <?php
        foreach ($commentaires AS $commentaire) {
            ?>
            <div class="com">
                <p><strong><?php echo htmlspecialchars($commentaire['pseudo']); ?></strong><strong id="datecom"> le <?php echo $commentaire['date_commentaire']; ?></strong></p>
                <p><?php echo nl2br(htmlspecialchars($commentaire['contenu_commentaire'])); ?></p>
                <p><i type="submit" class="signalercom fas fa-thumbs-down"></i></p>

                <br />
            </div>
        <?php
        } // Fin de la boucle des commentaires
        ?>
  
        