<?php

require_once("header.php");

$tramosHorarios = new TramosHorarios();

class TramosHorarios{

    public function __construct()
    {
        //$this -> header = new Header();
    }

    public function pintarHorarios(){

    }


    public function calendario(){
        echo "<div id='calendario'></div>";
        echo "<script src='assets/js/horarios.js'></script>";
        echo "<script src='assets/plugin/calendario/lib/main.js'></script>";
        echo "<link rel='stylesheet' href='assets/plugin/calendario/lib/main.css'>";
        echo "<link rel='stylesheet' href='assets/estilos/horarios.css'>";
        echo "<script src='assets/plugin/calendario/examples/js/theme-chooser.js'></script>";
        
    }

}

?>

