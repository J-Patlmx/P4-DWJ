<?php 
    require_once('src/Model/ChapitreManager.php');
        $chapitreManager = new ChapitreManager();
        $chapitres = $chapitreManager->findAll();
    
        die(
          
        );
    require_once('src/Model/UtilisateurManager.php');
        $utilisateurManager = new UtilisateurManager();
        $utilisateurs = $utilisateurManager->findAll();
        
        die(
            
        );
        require_once('src/Model/CommentaireManager.php');
        $commentaireManager = new CommentaireManager();
        $commentaires = $commentaireManager->findAll();
        
        die(
            
        );
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
            <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/style.css">
        <title>P4 Jean Forteroche</title>
    </head>

    <body>
      
        <header>
            <?php include('header.php');?>   
        </header>

        <aside>
            <?php include('news.php');?>
        </aside>

         <footer>
             <?php include('footer.php');?>
        </footer>
    </body>

</html>