<?php

require_once("controllers/recursosController.php");
require_once("controller.php");



class Route{
    public function __construct()
    {
        $this->basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $this->uri = substr($_SERVER['REQUEST_URI'], strlen($this->basepath));
        $this -> rutas($this -> uri);
    }

    public function rutas($uri){
        switch($uri){
            case "recursos":
                $recursos = new recursosController();
                $recursos -> verVista();
            break;

            default:
               $controlador = new Controller();
               $controlador -> error404();
                
        }
    }
}



