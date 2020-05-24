<div id="doite">
    <H1 id="titreh1"> Jean Forteroche</H1>
    <a id="pro">Ecrivain, Romancier</a>
</div>
<div>
    <?php if (isset($_SESSION['admin_user'])) { ?>
        <a href="index.php?action=logout" title="me Deconnecter"><i class="far fa-times-circle"></i></a>
    <?php } else { ?>
        <a href="index.php?action=login"title="me connecter"><i class="fas fa-sign-in-alt"></i></a>
    <?php } ?> 
</div>
<img id="imgheader" src="public/images/header.png">

<!-- far fa-times-circle -->
<!-- <i class="far fa-times-circle"></i> -->