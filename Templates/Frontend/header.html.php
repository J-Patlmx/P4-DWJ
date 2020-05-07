<div id="doite">
    <H1 id="titreh1"> Jean Forteroche</H1>
    <a id="pro">Ecrivain, Romancier</a>
</div>
<div>
    <?php if (isset($_SESSION['admin_user'])) { ?>
        <a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i></a>
    <?php } else { ?>
        <a href="index.php?action=login"><i class="fas fa-sign-in-alt"></i></a>
    <?php } ?>
</div>
<img id="imgheader" src="public/images/header.png">