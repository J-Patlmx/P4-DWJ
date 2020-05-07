<?php
if (isset($_SESSION['admin_user'])) {
    ?>

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
            <a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i></a>
            <?= '<h3 id="question">Que voulez-vous faire ?</h3>'; ?>
            <div id="choix">
                <a href="index.php?action=adminSignaler" class="pastille adminButton adminCom" rel="...">Gerer les Commentaires signalés</a>
                <a href="index.php?action=adminBillet" class="adminButton adminBillet">Administrer les Billets</a>
        </section>
        <br />
        <a href="index.php?action=logout">Se déconnecter</a>

    </div>
<?php
}
?>
<?php require_once 'Templates/Frontend/footer.html.php';?>