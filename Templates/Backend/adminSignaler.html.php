<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Gerer les Commantaires signaler</title>
</head>

<body>
    <h1>Gerer les Commantaires signaler</h1>
    <div>
        <a href="index.php?action=logout" title="me Deconnecter">
            <i class="far fa-times-circle"></i>
        </a>
    </div>
    <a href="index.php?action=dashboard">Bureau</a>
    <table>

        <thead>

            <tr>
                <th>Contenu Commentaire</th>
                <th>Pseudo</th>
                <th>Valider</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php //on boucle sur la variable result
            foreach ($commentaires as $adminCommentaireSignaler) {
                ?>
                <tr>
                    <td>
                        <a class="Commantaires"><?= $adminCommentaireSignaler['contenu_commentaire'] ?></a>
                    </td>
                    <td>
                        <a class="Pseudo"><?= $adminCommentaireSignaler['pseudo'] ?></a>
                    </td>

                    <td>
                        <button>
                            <a href="index.php?action=adminValiderCommentaire&id=<?= $adminCommentaireSignaler['id'] ?>"><i class="fas fa-thumbs-up"></i></a>
                        </button>
                    </td>
                    <td>
                        <button>
                            <a href="index.php?action=adminSupprimerCommentaire&id=<?= $adminCommentaireSignaler['id'] ?>"><i class="fas fa-thumbs-down"></i></a>
                        </button>
                    </td>
                </tr>
                
            <?php
            }
            ?>
        </tbody>
    </table>
    <footer>
        <?php require_once 'Templates/Frontend/footer.html.php'; ?>
    </footer>
</body>

</html>