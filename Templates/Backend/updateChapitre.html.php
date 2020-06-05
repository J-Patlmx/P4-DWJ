<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" contenu="width=device-width initial-scale=1.0">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

     <link rel="stylesheet" href="public/css/Back.style.css">
    
    <title>updateChapitre</title>
</head>

<body>
<header></header>
  
    <ul id="navigationAdmin">
    <li><a href="index.php?action=logout" title="me Deconnecter"><i class="fas fa-user-times"></i></a></li>
    <li><a href="index.php?action=dashboard" title="retour au bureau"><i class="fas fa-igloo"></i></a></li>
    <li><a href="index.php?action=adminBillet" title="gestion des chapitres"><i class="fas fa-tasks"></i></a></li>
    <li><a href="index.php?action=adminListeCommentaireSignaler" title="gestion les commentaires"><i class="fas fa-comment-dots"></i></a></li>
    <!-- <li><a href="#" title="aller à la section 5">item5</a></li> -->
</ul>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
                    $_SESSION['erreur'] = "";
                }
                ?>
                <h1> Modifier votre Chapitre !</h1>

                <form method="post" action="index.php?action=updateChapitre&id=<?= $chapitre->id ?>">
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="titre" class="form-control" value="<?= $chapitre->titre ?>">
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu :</label>
                        <input type="text" id="contenu" name="contenu" class="form-control" value="<?= $chapitre->contenu ?>">
                    </div>
                    <input type="hidden" value="<?= $chapitre->id ?>" name="id">
                    <input type="submit" value="modifier">
                   <!-- <button class="btn btn-primary">Modifier</button>-->
                </form>
            </section>
        </div>
    </main>

    <footer>
        <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>