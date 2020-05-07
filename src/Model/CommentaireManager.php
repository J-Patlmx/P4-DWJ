<?php
require_once('Database.php');
   
class CommentaireManager
{
   private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
    }
    
    public function findAll($id)
    {
        $req = $this->bdd->getBdd()->prepare('SELECT id, id_chapitre, contenu_commentaire, pseudo, signaler,date_commentaire FROM commentaire WHERE id_chapitre = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $resultat= $req->fetchAll();
        return $resultat;
    }
  
   
    public function add($commentaire)
    {
        $req = $this->bdd->getBdd()->prepare('INSERT INTO commentaire SET id_chapitre = :id_chapitre,pseudo = :pseudo, contenu_commentaire = :contenu_commentaire, signaler = :signaler, date_commentaire = :date_commentaire ');
        $req->bindValue(':pseudo',$commentaire->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':id_chapitre', $commentaire->getIdChapitre());
        $req->bindValue(':contenu_commentaire',$commentaire->getCommentaryContent(), PDO::PARAM_STR);
        $req->bindValue(':signaler',$commentaire->getSignaler(), PDO::PARAM_BOOL);
        $req->bindValue(':date_commentaire',$commentaire->getCreationDate());
        $req->execute();
    }

    public function findAllAdminCommentaire($id)
    {
        $req = $this->bdd->getBdd()->prepare('SELECT id, id_chapitre, contenu_commentaire, pseudo, signaler,date_commentaire FROM commentaire WHERE id_chapitre = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $result= $req->fetchAll();
        return $result;
    }

    public function addCommentaireAction($id_chapitre, $pseudo, $contenu_commentaire)
    {
            $req = $this->bdd->getBdd()->prepare('INSERT INTO `commentaire`(`id`, `pseudo`, `contenu_commentaire`, `signaler`, `date_commentaire`, `id_chapitre`) VALUES(?, ?, ?,?, ?, NOW())');
           // $result = $req->execute($id_chapitre, $pseudo, $contenu_commentaire);
            $result = $req->execute($id_chapitre, $pseudo, $contenu_commentaire);
            return $result ;
        //     $addComments = getBdd()-> prepare('INSERT INTO `commentaire`(`id`, `pseudo`, `contenu_commentaire`, `signaler`, `date_commentaire`, `id_chapitre`) VALUES(?, ?, ?, NOW())');
        //     $affectedLines = $addComments->execute(array());

        //     return $affectedLines;
    }

}
