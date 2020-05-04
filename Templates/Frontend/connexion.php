<?php

require_once 'src/Controller/ConnexionController.php'
?>

<link rel="stylesheet" href="Public/css/style.css">
<h1>CONNEXION ADMINISTRATEUR</h1>
    <h2 id="h2forminscription">votre compte administrateur</h2>
    <div align="center" class="form_connexion">
        <br /><br />
        <img src="public/images/avatar.png" alt="avatar">

        <form method="POST" action="">
            <label for="username">Pseudo :</label>
            <input type="text"  id="username" name="username" value="" />


            <label for="password">Mot de passe :</label>
            <input type="password"  id="password" name="password" value="" />

            <input type="submit" name="connexionadmin" value="Connexion" />
        </form>
    