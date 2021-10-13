<?php

require_once("../../../models/recursos.php");

$añadirRecurso = new AñadirRecurso();

class AñadirRecurso{


    public function __construct()
    {
        $this -> recursos = new RecursosModel();
        $this -> obtenerParametros();
        $this -> añadirRecurso($this -> nombre, $this -> descripcion, $this -> lugar, $this -> img);
       
    }

    public function obtenerParametros(){
        $this -> nombre = $_POST['nombre'];
        $this -> descripcion= $_POST['descripcion'];
        $this -> lugar= $_POST['lugar'];
        $this -> imagen= null;


    }

    public function añadirRecurso($nombre, $descripcion, $lugar, $img){
        $añadir = $this -> recursos -> crearRecursos($nombre, $descripcion, $lugar, $img);
        return $añadir;
    }

}