<?php
class Database 
{
    private $bdd;
    public function __construct()
    {
        try {
         $this->bdd = new PDO('mysql:host=localhost;dbname=BDD_jean_forteroche;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            // die('Erreur : ' . $e->getMessage());
            $this->bdd = null;
        }
    }
    public function getBdd()
    {
        return $this->bdd;
    }
}