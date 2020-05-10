<?php
require_once 'src/Model/CommentaireManager.php';

function addCommentaireAction($idChapitre, $pseudo, $contenuCommentaire)
{
    $commentaireManager = new CommentaireManager();
    $result = $commentaireManager->addCommentaireAction($idChapitre, $pseudo, $contenuCommentaire);
   /* if(isset($_POST['form_commentaire']))
    {
        if (!empty($_POST['pseudo']) && !empty($_POST['contenu_commentaire'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);//je declare ma variable pseudo avec la protection htmlspecialchars
            $contenuCommentaire = htmlspecialchars($_POST['contenu_commentaire']);
            $pseudolength = strlen($pseudo);

            if($pseudolength <= 255)
            {*/
                if ($result === false) 
                {
                    echo "Votre commentaire n'a pas pus être ajouté";
                    header('Location: index.php?action=chapitre&id=' . $idChapitre);
                    exit;
                }else 
                {
                    header('Location: index.php?action=chapitre&id=' . $idChapitre);
                    exit;
                }
                
    //        }
    //     }
    // }
}

function dashboardCommentaireSignalerAction($pseudo, $contenuCommentaire, $signaler)
{
    $adminCommentaireSignaler = new CommentaireManager();
    $result = $adminCommentaireSignaler->dashboardCommentaireSignalerAction($pseudo, $contenuCommentaire, $signaler);
    
    if ($adminCommentaireSignaler == $result >= 1) 
    {
        var_dump('commentaire signaler');
    } else 
    {
        var_dump('aucun commentaire de signaler');
    }

}