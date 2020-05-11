<?php
require_once('Database.php');
   
class UtilisateurManager
{
   private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
    }
    public function findAll()
    {
        $req = $this->bdd->getBdd()->query('SELECT email, id, mot_passe, username, utilisateur_role FROM utilisateur');
        $resultat= $req->fetchAll();
        return $resultat;
    }
    public function getUtilsateur($id)
    {
        $req = $this->bdd->getBdd()->prepare('SELECT id, username, mot_passe, email , utilisateur_role FROM utilisateur WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch( PDO::FETCH_OBJ);
        return $result;
    } 
   
    public function CheckUserLogin($utilisateur)
    {
            //co basse de donnees find username 
        $req = $this->bdd->getBdd()->prepare('SELECT id, username, mot_passe, email , utilisateur_role FROM utilisateur WHERE username = :username');
        $req->bindValue(':username', $utilisateur, PDO::PARAM_STR);
        $req->execute();
        var_dump($utilisateur);
        $result = $req->fetch( PDO::FETCH_OBJ);
        return $result;
    }
    public function add($utilisateur)
    {
        $req = $this->bdd->getBdd()->prepare('INSERT INTO utilisateur SET email = :email, mot_passe = :mot_passe, username = :username utilisateur_role = :utilisateur_role');
        $req->bindValue(':email',$utilisateur->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':mot_passe',$utilisateur->getMotPasse());
        $req->bindValue(':username',$utilisateur->getUsername(), PDO::PARAM_STR);
        $req->bindValue(':utilisateur_role',$utilisateur->getUtlisateuRole(), PDO::PARAM_STR);
        $req->execute();
    }
}


//TODO: function delete ne pas pouvoir supprimer le SUPERADMIN, si tu edit le super admin impossible de changer le role
