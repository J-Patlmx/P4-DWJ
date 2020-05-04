<?php
session_start(); //on demarre notre session
if ($_POST) {
    if (
        isset($_POST['titre']) && !empty($_POST['titre'])
        && isset($_POST['contenu']) && !empty($_POST['contenu'])
    ) {
        require_once('connex_bdd.php'); // j'inclu la connexion à ma base de donneés 
        //on netoie les donees envoyer
        $titre = strip_tags($_POST['titre']);
        $contenu = strip_tags($_POST['contenu']);

        $sql = 'INSERT INTO `chapitre` (`titre`, `contenu`, `date_creation`) VALUES (:titre, :contenu, CURRENT_TIMESTAMP)';

        $query = $bdd->prepare($sql);
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "votre chapitre est ajouté!";

        require_once('close.php');
        header('location: AdminBillet.php');
    } else {
        $_SESSION['erreur'] = " Formulaire incomplet !";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Ajout chapitrecrud</title>
</head>

<body>

    <header>

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

                <form method="post">
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="titre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu :</label>
                        <input type="text" id="contenu" name="contenu" class="form-control">
                    </div>

                    <button class="btn btn-primary">Publier</button>
                </form>
            </section>
        </div>
    </main>

    <footer>
                <?php require_once('footer.php'); ?>
    </footer>
</body>

</html>