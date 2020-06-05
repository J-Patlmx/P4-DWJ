<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/Back.style.css">
       
    <title>Gerer les Commantaires signaler</title>
</head>

<body>
<h1>Administrer les Commentaires</h1>
<ul id="navigationAdmin">
    <li><a href="index.php?action=logout" title="me Deconnecter"><i class="fas fa-user-times"></i></a></li>
    <li><a href="index.php?action=dashboard" title="retour au bureau"><i class="fas fa-igloo"></i></a></li>
    <li><a href="index.php?action=adminBillet" title="gestion des chapitres"><i class="fas fa-tasks"></i></a></li>
    <li><a href="index.php?action=adminListeCommentaireSignaler" title="gestion les commentaires"><i class="fas fa-comment-dots"></i></a></li>
    <!-- <li><a href="#" title="aller à la section 5">item5</a></li> -->
</ul>
    <h1>Gerer les Commantaires signaler</h1>
    <!--  TODO: gerer lespace avec un margin/padding a la place du h1 -->
   
    <!--<a href="index.php?action=dashboard">Bureau</a>-->
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