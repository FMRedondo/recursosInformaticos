<?php

use Recursos as GlobalRecursos;

require_once("../models/recursos.php");

$recursos = new Recursos();

class Recursos{

public function __construct(){
    $this -> RecursosController = new RecursosController();
    $this -> pintarRecursos();
}

public function pintarRecursos(){
    $vistaRecursos = $this -> RecursosController -> verRecursos();

    foreach($vistaRecursos as $recurso){
        $id = $recurso['id'];
        $nombre = $recurso['nombre'];
        $descripcion = $recurso['descripcion'];
        $localizacion = $recurso['localizacion'];
        $imagen = $recurso['imagen'];

        echo $id . " ";
        echo $nombre . " ";
        echo $descripcion . " ";
        echo $localizacion . " ";
        echo $imagen . " ";
        echo "<br>";
    }

}




}