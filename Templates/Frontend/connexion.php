<?php
if (isset($_SESSION)) { ?>
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <div align="center">
        <h2>Bienvenue <?= $user->username; ?></h2>
        <br /><br />
        Pseudo = <?= $user->username; ?>
        <br />
        Mail = <?= $user->email; ?>
        <br />
        <section>
            <a href="index.php"><i class="fas fa-sign-out-alt"></i></a>
            <?= '<h3 id="question">Que voulez-vous faire ?</h3>'; ?>
            <div id="choix">
                <a href="Templates/Frontend/signaler.html" class="pastille adminButton adminCom" rel="...">Gerer les Commentaires signalés</a>
                <a href="Templates/Frontend/AdminBillet.php" class="adminButton adminBillet">Administrer les Billets</a>
        </section>
        <br />
        <a href="?action=deconnexion.php">Se déconnecter</a>

    </div>
<?php
} else { ?>
    <link rel="stylesheet" href="Public/css/style.css">
    <h1>CONNEXION ADMINISTRATEUR</h1>
    <h2 id="h2forminscription">votre compte administrateur</h2>
    <div align="center" class="form_connexion">
        <br /><br />
        <img src="public/images/avatar.png" alt="avatar">

        <form method="POST" action="">
            <label for="username">Pseudo :</label>
            <input type="text" id="username" name="username" value="" />


            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" value="" />

            <input type="submit" name="connexionadmin" value="Connexion" />
        </form>

    <?php }


    require_once 'src/Controller/ConnexionController.php'
    ?>