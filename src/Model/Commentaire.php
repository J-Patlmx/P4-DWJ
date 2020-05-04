<?php
class Commentaire
{
    protected $id;
    protected $pseudo;
    protected $commentary_content;
    protected $signaler;
    protected $creation_date;
    protected $id_chapitre;
   

    public function getIdChapitre()//geteur
    {
        return $this->id_chapitre;
    }

    public function setIdChapitre($idchapitre)//seteur
    {
       
        $this->id_chapitre = $idchapitre;
       
    
    }
    //------------------------------------------------------
    public function getPseudo()//geteur
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)//seteur
    {
        if(is_string($pseudo))
        {
            $this->pseudo = htmlspecialchars($pseudo);
        }
       
    }
    //------------------------------------------------------
    public function getCommentaryContent()//geteur
    {
        return $this->commentary_content;
    }

    public function setCommentaryContent($commentary_content)//seteur
    {
        if(is_string($commentary_content))
        {
            $this->commentary_content = htmlspecialchars($commentary_content);
        }
       
    }
    
     //------------------------------------------------------
     public function getSignaler()//geteur
     {
         return $this->signaler;
     }

     public function setSignaler($signaler)//seteur
     {
         if(is_bool($signaler))
         {
             $this->signaler = $signaler;
         }
       
     }
     //------------------------------------------------------
     public function getCreationDate()//geteur
     {
         return $this->creation_date;
     }

     public function setCreationDate() //seteur 
     {
        $new_date = new DateTime();
        $new_date->setTimezone(new DateTimeZone('Europe/Paris'));
        $this->creation_date = $new_date->format('Y-m-d H.i:s');
       
       
     }
    //------------------------------------------------------
}
