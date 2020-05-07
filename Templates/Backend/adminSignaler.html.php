<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/style.css">
        <title>Gerer les Commantaires signaler</title>
    </head>

    <body>
        <h1>Gerer les Commantaires signaler</h1>
        <div>
            <a href="index.php?action=logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
        <a href="index.php?action=dashboard">Bureau</a>
        <table>
            <thead>
                <tr>
                    <th colspan="1">Gestion des Signalements</th>
                    <td>Valider</td>
                    <td>Supprimer</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a class="Commantaires">ICI LE COMMENTAIRE SIGNALER</a>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-down"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="Commantaires">ICI LE COMMENTAIRE SIGNALER</a>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-down"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="Commantaires">ICI LE COMMENTAIRE SIGNALER</a>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-down"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="Commantaires">ICI LE COMMENTAIRE SIGNALER</a>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    </td>
                    <td>
                        <button>
                            <i class="fas fa-thumbs-down"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    
        <?php require_once 'Templates/Frontend/footer.html.php';?>
    </body>
</html>