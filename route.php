<?php

require_once("controllers/recursosController.php");
require_once("controllers/usersController.php");
require_once("controllers/tramosHorariosController.php");
require_once("controller.php");
require_once("views/header.php");



class Route{
    public function __construct()
    {
        $this -> controlador = new Controller();
        $this -> basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $this -> uri = substr($_SERVER['REQUEST_URI'], strlen($this->basepath));
        $this -> header = new Header();
        $this -> segmentar($this -> uri);
        $this -> rutas($this -> segmentos, $this -> uri);
        
    }

    public function segmentar($uri){
        $this -> segmentos = explode("/", $uri);
    }


    public function rutas($segmento, $uri){
        switch($segmento){

            // rutas para recursos


            case $segmento[0] == "recursos":

                $numSeg = count($segmento);
                $recursosController = new recursosController();
                
                switch($numSeg){
                    case $numSeg == 1 && $uri == "recursos" || $uri == "recursos/":
                        $recursosController -> verVista();
                    break;

                    case $numSeg == 2 && $this -> segmentos[1] == "Depedit":
                        $recursosController -> mostrarModificarRecurso();
                    break;

                    case $numSeg == 2 && $this -> segmentos[1] == "edit":
                        $recursosController -> modificarRecurso();
                    break;

                    case $numSeg == 2 && $this -> segmentos[1] == "delete":
                        $recursosController -> eliminarRecurso();
                    break;

                    case $numSeg == 2 && $this -> segmentos[1] == "add":
                        $recursosController -> añadirRecurso();
                    break;

                    case $numSeg == 2 && $this -> segmentos[1] == "search":
                        $recursosController -> buscarRecurso();
                    break;

                    default:
                    $this -> controlador -> error404();
                }

            break;



        // ruta para usuarios


        case $segmento[0] == "usuarios":

            $numSeg = count($segmento);
            $usuarioController = new usersController();
            
            switch($numSeg){
                case $numSeg == 1 && $uri == "usuarios" || $uri == "usuarios/":
                    $usuarioController -> verVista();
                break;

                case $numSeg == 2 && $this -> segmentos[1] == "Depedit":
                    $usuarioController -> mostrarModificarUsuario();
                break;

                case $numSeg == 2 && $this -> segmentos[1] == "edit":
                    $usuarioController -> modificarUsuario();
                break;

                case $numSeg == 2 && $this -> segmentos[1] == "delete":
                    $usuarioController -> eliminarUsuario();
                break;

                case $numSeg == 2 && $this -> segmentos[1] == "add":
                    $usuarioController -> añadirUsuario();
                break;

                case $numSeg == 2 && $this -> segmentos[1] == "search":
                    $usuarioController -> buscarUsuario();
                break;
                default:
                $this -> controlador -> error404();
            }

        break;

        case $segmento[0] == "":

            $horariosController = new TramosHorariosController();
            $horariosController -> verCalendario();
            
        break;




            default:
               $this -> controlador -> error404();
                
        }
    }
}