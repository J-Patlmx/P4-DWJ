<?php
if (isset($_SESSION['admin_user'])) {
    ?>

    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/Back.style.css">
    <nav>
    <ul id="navigationAdmin">
        <li><a href="index.php?action=logout" title="me Deconnecter"><i class="fas fa-user-times"></i></a></li>
    </ul>
         </nav>  
    
    <div align="center">
   
        <h2>Bienvenue <?= $data['user']->username; ?></h2>
        <br /><br />
        Pseudo = <?= $data['user']->username; ?>
        <br />
        Mail = <?= $data['user']->email; ?>
        <br /> 
        <section>
       
            <?= '<h3 id="question">Que voulez-vous faire ?</h3>'; ?>
            <div id="choix">
                <a href="index.php?action=adminListeCommentaireSignaler" class="pastille adminButton adminCom link" rel=" <?= $data['nbcommentairesignaler']; ?>">Gerer les Commentaires signalés</a>
                <a href="index.php?action=adminBillet" class="adminButton adminBillet link">Administrer les Billets</a>
        </section>
        <br />
     
    </div>
<?php
}
?>
