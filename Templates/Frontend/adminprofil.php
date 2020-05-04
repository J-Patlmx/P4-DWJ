<?php
session_start();
?>

<div align="center">
    <h2>Bienvenue <?=$user->username; ?></h2>
    <br /><br />
    Pseudo = <?= $user->username; ?>
    <br />
    Mail = <?= $user->email; ?>
    <br />
<section>
            <a href="index.php"><i class="fas fa-sign-out-alt"></i></a>
            <?= '<h3 id="question">Que voulez-vous faire ?</h3>'; ?>
            <div id="choix">
                <a href="concentre_toi/signaler.html" class="pastille adminButton adminCom" rel="...">Gerer les Commentaires signalés</a>
                <a href="test/AdminBillet.php" class="adminButton adminBillet">Administrer les Billets</a>
</section>
<br />
        <a href="deconnexion.php">Se déconnecter</a>
    <?php
    if (isset($_SESSION['id']) and $user->id == $_SESSION['id']) {
        ?>
    <?php
    } else {
        $error;
    }
    ?>
</div>
