<?php
session_start();
 

include('connex_bdd.php'); // connexion a la base de donnee via mon include
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM utilisateur WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Pofil Admin</title>
   </head>
   <body>
      <div align="center">
         <h2>Bienvenue  <?php echo $userinfo['username']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['username']; ?>
         <br />
         Mail = <?php echo $userinfo['email']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>




        <aside>
            <a href="index.php"><i class="fas fa-sign-out-alt"></i>
        </a>
    <?php
           echo '<h3 id="question">Que voulais vous faire ?</h3>';
    ?>
            <div id="choix">
                <a href="signaler.html" class="pastille adminButton adminCom" rel="...">
                    Gerer les Commentaires signalés
                </a>

                <a href="AdminBillet.html" class="adminButton adminBillet">Administrer les Billets

                </a>
           

        </aside>




         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>