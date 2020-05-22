<?php
require_once 'Database.php';


class ChapitreManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
    }
    public function findAll()
    {
        $req = $this->bdd->getBdd()->query('SELECT id, titre, contenu, publication, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM chapitre ORDER BY date_creation DESC LIMIT 0, 4');
        $resultat = $req->fetchAll();
        return $resultat;
    }

    public function getUnique($id)
    {
        $req = $this->bdd->getBdd()->prepare('SELECT id, titre, contenu, publication, date_creation FROM chapitre WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        return $result;
    }
     //public function add($chapitre)
    // {
    //     $req = $this->bdd->getBdd()->prepare('INSERT INTO chapitre SET titre = :titre, contenu = :contenu, publication = :publication, date_creation = :date_creation ');
    //     $req->bindValue(':titre',$chapitre->getTitle(), PDO::PARAM_STR);
    //     $req->bindValue(':contenu',$chapitre->getContent(), PDO::PARAM_STR);
    //     $req->bindValue(':publication',$chapitre->getPublish(), PDO::PARAM_BOOL);
    //     $req->bindValue(':date_creation',$chapitre->getCreationDate());
    //     $req->execute();
    // }
    public function findAllAdminBillet()
    {
        $req = $this->bdd->getBdd()->query('SELECT id, titre, contenu, publication, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM chapitre ORDER BY date_creation DESC');
        $resultat = $req->fetchAll();
        return $resultat;
    }



    public function dashboardAddChapitreAction($titre, $contenu)
    {
        $req = $this->bdd->getBdd()->prepare('INSERT INTO `chapitre` (`titre`, `contenu`, `date_creation`) VALUES (:titre, :contenu, CURRENT_TIMESTAMP)');
        $result = $req->execute([
            'titre'   => $titre,
            'contenu' => $contenu 
        ]);
        return $result;
    }
/*-----------------SUPPRESSION D'UN CHAPITRE PAR SON ID-------------------*/
/*-----------------je selectionne le CHAPITRE PAR SON ID-------------------*/
     public function Chapitre($id)
      {
          //je prepare ma req de recherche de l id du chapitre que je veux supprimer
          $req = $this->bdd->getBdd()->prepare('SELECT * FROM chapitre WHERE id= :id');
          $result = $req->execute([
              'id' => $id 
          ]);
          $result = $req->fetch();
     
      }
/*----------------- puis je le SUPPRIME le CHAPITRE PAR SON ID-------------------*/
        public function deleteChapitre($id)
        {
            $req = $this->bdd->getBdd()->prepare('DELETE  FROM chapitre WHERE chapitre . id= :id;');
                $result = $req->execute([
                    'id' => $id 
                ]);
                return $result;
        }

/*----------------publication d'article---------------*/
        public function publierChapitre($id)
        {
            $req = $this->bdd->getBdd()->prepare('UPDATE chapitre SET `publication` = 1 WHERE id = :id');
                $result = $req->execute([
                    'id' => $id 
                ]);
                return $result ;
        }
}
