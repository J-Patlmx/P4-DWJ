<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Administration Billets</title>
</head>

<body>

    <h1>Administrer les Billets</h1>
    <div>
        <a href="index.php?action=logout" title="me Deconnecter">
            <i class="far fa-times-circle"></i>
        </a>
        <a href="index.php?action=dashboard">Bureau</a>
    </div>

    <h1> Gerer les chapitres</h1>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
                    $_SESSION['erreur'] = "";
                }
                ?>
                <?php if (!empty($_SESSION['message'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                    $_SESSION['message'] = "";
                }
                ?>

                <table class="table">
                    <thead>

                        <th>TITRE</th>
                        <th>CONTENU</th>
                        <th>DATE PUBLICATION</th>
                        <th>PUBLIER</th>
                        <th>ACTION</th>

                    </thead>


                    <tbody>
                        <a class="btn btn-primary" href="index.php?action=addNewChapitre"> Ajouter un Chapitre</a>
                        <?php
                        //on boucle sur la variable result
                        foreach ($result as $chapitre) {
                            ?>

                            <tr>
                                <!-- <td><?= $chapitre['id'] ?></td> -->
                                <td><?= $chapitre['titre'] ?></td>
                                <td><?= "Pour lire ce chapitre cliqué sur lire la suite !" ?></td>
                                <td><?= $chapitre['date_creation_fr'] ?></td>
                                <td><?= $chapitre['publication'] ?></td>
                                <td>
                                    <a title="lire le chapitre" href="index.php?action=chapitre&id=<?= $chapitre['id'] ?>"><i class="fas fa-book-open"></i></a>
                                    <a title="modifier le chapitre" href="index.php?action=updatechapitre&id<?= $chapitre['id'] ?>"><i class="far fa-edit"></i></a>
                                    <a title="supprimer ce chapitre" href="index.php?action=deleteChapitre&id=<?= $chapitre['id'] ?>"><i class="far fa-trash-alt"></i></a>
                                    <a title="publier/ dépublier ce chapitre" href="index.php?action=publierChapitre&id=<?= $chapitre['id'] ?>"><i class="far fa-check-square"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </section>

        </div>

    </main>

    <footer>
        <?php require_once 'Templates/Frontend/footer.html.php'; ?>
    </footer>
</body>

</html>