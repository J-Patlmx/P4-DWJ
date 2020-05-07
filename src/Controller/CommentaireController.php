<?php
require_once 'src/Model/CommentaireManager.php';
function addCommentaireAction($id_chapitre, $pseudo, $contenu_commentaire)
{

    $commentaireManager = new CommentaireManager();

    $result = $commentaireManager->addCommentaireAction($id_chapitre, $pseudo, $contenu_commentaire);
  
    if ($result === false) 
    {
         echo 'ca marche pas';
        //throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else 
    {
        header('Location: index.php?action=chapitre&id=' . $id_chapitre);
    }





  /*  if (isset($_POST['pseudo']) && isset($_POST['contenu_commentaire']))
    {
        $commentaireManager  = new CommentaireManager();
        $result = $commentaireManager->addCommentaireAction();
        var_dump('commentaire ajouter ');
    
        exit;
    } else {
         echo 'erreur';
        
    }*/
 
}