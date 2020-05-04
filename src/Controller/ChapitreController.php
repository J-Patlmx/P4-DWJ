<?php 
require_once 'src/Model/ChapitreManager.php';
require_once 'src/Model/CommentaireManager.php';
function homePageAction()
{
    $chapitreManager    = new ChapitreManager();
    $chapitre           = false;
    $commentaires       = false;

        $page = [
            'title'         => 'P4 JEAN Forteroche - Liste Chapitre',
            'page'          => 'listechapitre',
            'listechapitre' => $chapitreManager->findAll()
        ];

    include_once __DIR__.'/../../Templates/Frontend/index.php';
}
function chapitreAction($id)
{

    $chapitreManager    = new ChapitreManager();
    $chapitre           = false;
    $commentaireManager = new CommentaireManager();
    $commentaires       = false;

    if(isset($id))
    {
        $id             = (int)$id;
        $chapitre       = $chapitreManager->getUnique($id);
        $commentaires   = $commentaireManager->findAll($id);
    }

    if (is_object($chapitre)) {
        $page = [
            'title'         => 'P4 JEAN Forteroche - '.$chapitre->titre,
            'page'          => 'chapitre'
        ];
        include_once __DIR__.'/../../Templates/Frontend/index.php';
    } else
    {
        header('location:404.php');
        exit;
    }
   
    
}