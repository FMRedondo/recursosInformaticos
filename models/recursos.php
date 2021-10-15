<?php

require_once("conexion.php");

class RecursosModel{

    private $conexion;

    public function __construct(){
        $this -> conexion = new MySQLDB();
    }

    public function verRecursos(){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM recursos";
        $recursos = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $recursos;
    }

    public function crearRecursos($nombre, $descripcion, $lugar, $img){
        $this -> conexion -> conectar();
        $sql = "INSERT INTO recursos (nombre, descripcion, localizacion, imagen) VALUES ('$nombre', '$descripcion', '$lugar', '$img')";
        $this -> conexion -> ejecutarSQL($sql);
        $ultimoID = $this -> conexion -> obtenerUltimoId();
        $this -> conexion -> cerrar();
        echo $ultimoID;
    }

    public function actualizarRecursos($campo, $valor, $id){
        $this -> conexion -> conectar();
        $sql = "UPDATE recursos SET $campo = '$valor' WHERE id = $id";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();

    }

    public function eliminarRecursos($id){
        $this -> conexion -> conectar();
        $sql = "DELETE FROM recursos WHERE (id = $id)";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
    }

    public function buscarRecursos($busqueda){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM recursos WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR localizacion LIKE '%$busqueda%'";
        $recursos = $this -> conexion -> obtenerInformacion($sql);
        $this -> conexion -> cerrar();
        return $recursos;
    }

    public function buscarRecurso($id){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM recursos WHERE (id = $id)";
        $recursos = $this -> conexion -> obtenerInformacion($sql);
        $this -> conexion -> cerrar();
        return $recursos;
    }

}