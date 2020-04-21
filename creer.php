<?php
session_start();
require_once('connex_bdd.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://cdn.tiny.cloud/1/a69ktlbqdmhut7fj7dsa12pvv5zvbdytpmq75enunhwauu8q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Creations de billets</title>
    
</head>
<body>
    
<textarea id="format-custom">
  <h1>Hello World !</h1>
</textarea>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name'
    });
  </script>
  <a href="index.php">retour à l'accueil</a> <a href="profil.php?id=?">retour au bureau !</a>
</body>
</html>
