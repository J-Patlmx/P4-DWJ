<h1 id="H1HeaderBlog"> Jean Forteroche</h1>
<a id="metierJFHeader">Ecrivain, Romancier</a>


<?php if (isset($_SESSION['admin_user'])) { ?>
    <nav>
        <ul id="navigationAdmin">
            <li><a href="index.php?action=logout" title="me Deconnecter"><i class="fas fa-user-times"></i></a></li>
            <li><a href="index.php?action=dashboard" title="retour au bureau"><i class="fas fa-igloo"></i></a></li>
            <li><a href="index.php?action=adminBillet" title="gestion des chapitres"><i class="fas fa-tasks"></i></a></li>
            <li><a href="index.php?action=adminListeCommentaireSignaler" title="gestion les commentaires"><i class="fas fa-comment-dots"></i></a></li>
            <li> <?php } else { ?>
                <a href="index.php?action=login" title="me connecter"><i class="fas fa-sign-in-alt"></i></a>
            <?php } ?></li>
        </ul>
    </nav>


    <!-- <img id="imgheader" src="public/images/header.png"> -->

    <!-- <i class="fas fa-house-user"></i>
<i class="fas fa-user-times"></i> -->