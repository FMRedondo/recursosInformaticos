<?php

require_once("conexion.php");

class RecursosModel{

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

    public function buscarRecursos($busqueda){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM recursos WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR localizacion LIKE '%$busqueda%'";
        $recursos = $this -> conexion -> obtenerInformacion($sql);
        $this -> conexion -> cerrar();
        return $recursos;
    }



}