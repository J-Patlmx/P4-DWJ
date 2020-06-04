<div id="doite">
    <H1 id="H1HeaderBlog"> Jean Forteroche</H1>
    <a  id="metierJFHeader">Ecrivain, Romancier</a>
</div>
<div>
    <?php if (isset($_SESSION['admin_user'])) { ?>
        
           <a href="index.php?action=logout" title="me Deconnecter"><i class="fas fa-user-times"></i></a>
           <a href="index.php?action=dashboard" title="retour au bureau"><i class="fas fa-igloo"></i></a>
            
    
        
    <?php } else { ?>
        <a href="index.php?action=login"title="me connecter"><i class="fas fa-sign-in-alt"></i></a>
    <?php } ?> 
</div>
<img id="imgheader" src="public/images/header.png">

<!-- <i class="fas fa-house-user"></i>
<i class="fas fa-user-times"></i> -->