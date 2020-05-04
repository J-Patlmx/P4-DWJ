<?php 
session_start();//on demarre notre session

// est-ce que l'id existe et n'est pas  vide  dans l url?
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connex_bdd.php');
    //on netoie l id envoyer
    $id = strip_tags($_GET['id']);  

    $sql = 'SELECT * FROM chapitre WHERE id= :id;';
    //on prepare la requête
    $query=$bdd->prepare($sql);
    //on accroche les parametre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //on execute la requete
    $query->execute();
    // on recupere le chapitre 
    $chapitre = $query->fetch();
    // on verifie si le chapitre existe
    if(!$chapitre){
        $_SESSION['erreur'] = "Le chapitre n'es pas encore ecrit ! please Wait ...";
        header('location: AdminBillet.php');
    }
    $sql = 'DELETE  FROM chapitre WHERE chapitre . id= :id;';
    //on prepare la requête
    $query=$bdd->prepare($sql);
    //on accroche les parametre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //on execute la requete
    $query->execute();
        $_SESSION['message'] = "Le chapitre est supprimé !";
        header('location: AdminBillet.php');
        
    }else{
        $_SESSION['erreur'] = "De quel Chapitre parlez-vous ?!";
        header('location: AdminBillet.php');
    }


?>