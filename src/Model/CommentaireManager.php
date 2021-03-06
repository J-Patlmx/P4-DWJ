<?php
require_once('Database.php');
   
class CommentaireManager
{
   private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
    }
/*----------------------------REQUETE RECHERCHE DE TOUT LES COMMENTAIRES par ID--------------------------------------------*/ 
    public function findAll($id)
    {
        $req = $this->bdd->getBdd()->prepare('SELECT id, id_chapitre, contenu_commentaire, pseudo, signaler,date_commentaire 
                                              FROM commentaire 
                                              WHERE id_chapitre = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $resultat= $req->fetchAll();
        return $resultat;
    }
  

/*----------------------------REQUETE RECHERCHE DE TOUT LES COMMENTAIRES Pour la partie admin--------------------------------------------*/
    public function findAllAdminCommentaire($id)
    {
        $req = $this->bdd->getBdd()->prepare('SELECT id, id_chapitre, contenu_commentaire, pseudo, signaler,date_commentaire 
                                              FROM commentaire 
                                              WHERE id_chapitre = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $result= $req->fetchAll();
        return $result;
    }
/*----------------------------REQUETE AJOUT DE COMMENTAIRE--------------------------------------------*/
    public function addCommentaireAction($idChapitre, $pseudo, $contenuCommentaire)
    {
        $req = $this->bdd->getBdd()->prepare('INSERT INTO commentaire (`pseudo`, `contenu_commentaire`, `signaler`, `date_commentaire`, `id_chapitre`) 
                                              VALUES (:pseudo, :contenuCommentaire, 0, 
                                              NOW(), :idChapitre)');
            $result = $req->execute([
                'idChapitre' => $idChapitre, 
                'pseudo' => $pseudo, 
                'contenuCommentaire' => $contenuCommentaire
            ]);
            return $result ;
    }

    /*------------------------------REQUETE COMMENTAIRE SIGNALER------------------------------------------*/
    public function findAllCommentaireSignaler()
    {
        $req = $this->bdd->getBdd()->prepare('SELECT *
                                              FROM commentaire 
                                              WHERE signaler = 1');

        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    public function validerCommentaire($id)
    {
        $req = $this->bdd->getBdd()->prepare('UPDATE commentaire SET `signaler` = 0 WHERE id = :id');
            $result = $req->execute([
                'id' => $id 
            ]);
            return $result ;
    }
    public function supprimerCommentaire($id)
    {
        $req = $this->bdd->getBdd()->prepare("DELETE FROM `commentaire` WHERE `commentaire`.`id` = :id");
            $result = $req->execute([
                'id' => $id 
            ]);
            return $result ;
    }

    public function signalerUnCommentaire($id)
    {
        $req = $this->bdd->getBdd()->prepare('UPDATE commentaire SET `signaler` = 1 WHERE id = :id');
            $result = $req->execute([
                'id' => $id 
            ]);
            return $result ;
    }

   public function afficherNombreCommentaireSignaler()
    {
        $req = $this->bdd->getBdd()->prepare('SELECT COUNT(*) nb 
        FROM `commentaire`
        WHERE`signaler`= 1');
        $req->execute();
        $result = $req->fetch();
        return $result['nb'];
    
    }
}