<?php 
session_start();//on demarre notre session

// est-ce que l'id existe et n'est pas  vide  dans l url?
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connex_bdd.php');
    //on netoie l id envoyer
    $id = strip_tags($_GET['id']);  

    $sql = 'SELECT * FROM chapitre WHERE id= :id;';
    //on prepare la requête
    $query=$bdd->prepare($sql);
    //on accroche les parametre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //on execute la requete
    $query->execute();
    // on recupere le chapitre 
    $chapitre = $query->fetch();
    // on verifie si le chapitre existe
    if(!$chapitre){
        $_SESSION['erreur'] = "Le chapitre n'es pas encore ecrit ! please Wait ...";
        header('location: AdminBillet.php');
    }
    }else{
        $_SESSION['erreur'] = "De quel Chapitre parlez-vous ?!";
        header('location: AdminBillet.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>LA SUITE ...</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Voici la Suite de <?= $chapitre['titre'] ?>!</h1>
                <h3><?= $chapitre['titre'] .'</h>'.'<h5>'. " " . $chapitre['date_creation'] .'</h5>' ?>
                <p><?= $chapitre['contenu'] ?></p>
                <p>
                    <a href="AdminBillet.php">Retour</a>
                    <a href="update.php?id=<?= $chapitre['id'] ?>">Modifier</a>
                </p>
            </section>
        </div>
    </main>
    <footer>
                <?php require_once('footer.php'); ?>
    </footer>
</body>
</html>