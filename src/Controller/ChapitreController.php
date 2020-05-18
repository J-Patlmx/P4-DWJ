<?php 
require_once 'src/Model/ChapitreManager.php';
require_once 'src/Model/CommentaireManager.php';
require_once 'src/View/View.php';
function homePageAction()
{
    $chapitreManager    = new ChapitreManager();
    $chapitre           = false;
    $commentaires       = false;

        $data = [
            'title'         => 'P4 JEAN Forteroche - Liste Chapitre',
            'page'          => 'listechapitre',
            'listechapitre' => $chapitreManager->findAll()
        ];
        $view = new View();
        $view->render('Frontend', $data);
  //include_once __DIR__.'/../../Templates/Frontend/index.html.php';
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
        $data = [
            'title'         => 'P4 JEAN Forteroche - '.$chapitre->titre,
            'page'          => 'chapitre',
            'chapitre'          => $chapitre,
            'commentaires'          => $commentaires,
        ];
        $view = new View();
        $view->render('Frontend', $data);
        
        //include_once __DIR__.'/../../Templates/Frontend/index.html.php';
    } else
    {
        header('location:404.php');
        exit;
    }
   
    
}