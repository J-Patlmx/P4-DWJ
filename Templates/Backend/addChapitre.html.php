<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <link rel="stylesheet" href="public/css/Back.style.css">
 
    <title>Ajout chapitrecrud</title>
</head>

<body>
    <header>
        <a href="index.php?action=logout" title="me Deconnecter"><i class="fas fa-user-times"></i></a>
        <a href="index.php?action=dashboard" title="retour au bureau"><i class="fas fa-igloo"></i></a>
    </header>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
                    $_SESSION['erreur'] = "";
                }
                ?>
                <h1> Ajoutez votre Chapitre !</h1>

                <form method="post" action="index.php?action=addNewChapitre">
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="titre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu :</label>
                        <input type="textarea" id="contenu" name="contenu" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-primary" value=" publier ">
                </form>
            </section>
        </div>
    </main>

    <footer>
        <?= require_once('footer.php'); ?>
    </footer>
</body>

</html>