<?php

class Chapitre
{
    protected $id;
    protected $title;
    protected $content;
    protected $creation_date;
    protected $publish;

    public function getTitle()//geteur
    {
        return $this->title;
    }

    public function setTitle($title)//seteur
    {
        if(is_string($title))
        {
            $this->title = htmlspecialchars($title);
        }
       
    }
    //------------------------------------------------------
    public function getContent()//geteur
    {
        return $this->content;
    }

    public function setContent($content)//seteur
    {
        if(is_string($content))
        {
            $this->content = htmlspecialchars($content);
        }
       
    }
    
     //------------------------------------------------------
     public function getPublish()//geteur
     {
         return $this->publish;
     }

     public function setPublish($publish)//seteur
     {
         if(is_bool($publish))
         {
             $this->publish = $publish;
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
   
     public function getId()
    {
        return (int)$this->id; 
    }

     public function setId() //seteur 
        {
        $chapitre = new id();
        $id = $chapitre->getId($chapitre);
      
    }
    //------------------------------------------------------
}
       