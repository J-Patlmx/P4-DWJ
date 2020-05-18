<?php
require_once 'src/Model/CommentaireManager.php';
require_once 'src/View/View.php';

function addCommentaireAction($idChapitre, $pseudo, $contenuCommentaire)
{
    $commentaireManager = new CommentaireManager();
    $result = $commentaireManager->addCommentaireAction($idChapitre, $pseudo, $contenuCommentaire);
  
    if ($result === false) {
        var_dump("Votre commentaire n'a pas pus être ajouté");
    } else {
        header('Location: index.php?action=chapitre&id=' . $idChapitre);
        exit;
    }
}

function dashboardCommentaireSignalerAction($pseudo, $contenuCommentaire, $signaler)
{
    $adminCommentaireSignaler = new CommentaireManager();
    $result = $adminCommentaireSignaler->dashboardCommentaireSignalerAction($pseudo, $contenuCommentaire, $signaler);

    if ($adminCommentaireSignaler == $result >= 1) {
        var_dump('commentaire signaler');
    } else {
        var_dump('aucun commentaire de signaler');
    }
}

function signalerUnCommentaireAction($id)
{
    $signalerUnCommentaire = new CommentaireManager();
    $result = $signalerUnCommentaire->signalerUnCommentaire($id);

    header('location:index.php?action=chapitre');
    exit;
 
}
