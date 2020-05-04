<?php

class Utilisateur
{
    protected $email;
    protected $id;
    protected $mot_passe;
    protected $username;
    protected $utilisateur_role;

    public function getEmail()//geteur
    {
        return $this->email;
    }

    public function setEmail($email)//seteur
    {
        if(is_string($email))
        {
            $this->email = htmlspecialchars($email);
        }
       
    }
    //------------------------------------------------------
    public function getId()
    {
        return (int)$this->id; 
    }

     public function setId() //seteur 
        {
        $utilisateur = new id();
        $id = $utilisateur->getId($utilisateur);
      
    }
    //------------------------------------------------------
    public function getMotPasse()//geteur
    {
        return $this->mot_passe;
    }

    public function setMotPasse($motpasse)//seteur
    {
        
        {
            $this->mot_passe = htmlspecialchars($motpasse);
        }
       
    }
    
     //------------------------------------------------------
     public function getUsername()//geteur
     {
         return $this->username;
     }

     public function setUsername($username)//seteur
     {
         if (is_string($username))
         {
             $this->username = htmlspecialchars($username);
         }
       
     }
    //------------------------------------------------------

    public function getUtilisateurRole()//geteur
    {
        return $this->utilisateurRole;
    }

    public function setUtilisateurRole($utilisateur_role = 'guest')//seteur
    {
        if(is_string($utilisateur_role))
        {
            $this->utilisateurrole = htmlspecialchars($utilisateur_role);
        }
       
    }
}