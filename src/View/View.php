<?php

class View{

    protected $viewPath = 'Templates/';

    public function render($source, $data)
    {
        ob_start(); // on stoke la data en tampon
        require($this->viewPath . $source. '/'.$data['page'] . '.html.php');
        $content = ob_get_clean();  //on affiche le stokage du tampon           
       require($this->viewPath . $source. '/'.'index.html.php'); //layout
    }
} 
?>