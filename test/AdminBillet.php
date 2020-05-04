<?php 
session_start();//on demarre notre session

require_once 'connex_bdd.php';// j'inclu la connexion à ma base de donneés 

$sql = 'SELECT * FROM chapitre';
$query = $bdd->prepare($sql);// je prepare ma requete
$query->execute();// j'execute ma requete
$result = $query->fetchAll(pdo::FETCH_ASSOC);// je stoke le resultat dans un tableau associatif

require_once 'close.php'; 
   
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
        <link rel="stylesheet" href="public/css/styles.css">
        <title>Administration Billets</title>
    </head>

    <body>

        <h1>Administrer les Billets</h1>
        <div>
            <a href="index.php">
                <i class="fascrud fas fa-sign-out-alt"></i>
            </a>
        </div>
            
         <h1> Gerer les chapitres</h1>
            
        <main class="container">
                <div class="row">
                    <section class="col-12">
                        <?php if(!empty($_SESSION['erreur'])){
                                  echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
                                  $_SESSION['erreur'] = "";
                                 
                                } 
                        ?>
                        <?php if(!empty($_SESSION['message'])){
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
                                    <?php 
                                    //on boucle sur la variable result
                                    foreach($result as $chapitre){
                                        ?>
                                            <tr>
                                                <!-- <td><?= $chapitre['id']?></td> -->
                                                <td><?= $chapitre['titre']?></td>
                                               <td><?= "Pour lire ce chapitre cliqué sur lire la suite !"?></td>
                                                <td><?= $chapitre['date_creation']?></td>
                                                <td><?= $chapitre['publication']?></td>
                                                <td>
                                                    <a href="lirelasuite.php?id=<?= $chapitre['id']?>"><i class="fas fa-book-open"></i></a>
                                                    <a href="update.php?id=<?= $chapitre['id']?>"><i class="far fa-edit"></i></a>
                                                    <a href="concentre_toi/delete.php?id=<?= $chapitre['id']?>"><i class="far fa-trash-alt"></i></a>
                                                    <a href="publish.php?id=<?= $chapitre['id']?>"><i class="far fa-check-square"></i></a>
                                                </td>
</tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        
                    </section>
                   
                </div>
                <a href="add.php" class="btn btn-primary"> Ajouter un Chapitre</a>
            </main>
            
            <footer>
               <?php require_once('Templates/Frontend/footer.php'); ?>
    </footer>
    </body>

</html>