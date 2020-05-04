<?php
session_start();
require_once 'src/Model/Database.php';
if (isset($_SESSION)) { ?>
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
                <a href="Templates/Frontend/signaler.html" class="pastille adminButton adminCom" rel="...">Gerer les Commentaires signalés</a>
                <a href="Templates/Frontend/AdminBillet.php" class="adminButton adminBillet">Administrer les Billets</a>
</section>
<br />
        <a href="?action=deconnexion.php">Se déconnecter</a>
    
</div>
<?php 
}else {
    echo "non la session nes pas lancer";
}
?>


