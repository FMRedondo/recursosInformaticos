<?php

require_once("conexion.php");

class RecursosController{

    private $conexion;

    public function __construct()
    {
        $this -> conexion = new MySQLDB();
    }

    public function verRecursos(){
       
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM recursos";
        $recursos = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $recursos;
    }

    public function crearRecursos(){

    }

    public function actualizarRecursos(){

    }

    public function eliminarRecursos(){

    }



}