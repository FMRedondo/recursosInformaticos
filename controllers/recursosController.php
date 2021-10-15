<?php

require_once("../models/recursos.php");

$recurso = new recursosController();

class recursosController{

    public function __construct()
    {
        $this -> recursosModel = new RecursosModel();
        $this -> obtenerFuncion();
    }

    public function obtenerFuncion(){
        $funcion = $_POST['funcion'];
        $this -> $funcion();
    }


    public function añadirRecurso(){

        $nombre = $_POST['nombre'];
        $descripcion= $_POST['descripcion'];
        $lugar= $_POST['lugar'];
        $imagen= null;
        $añadir = $this -> recursosModel -> crearRecursos($nombre, $descripcion, $lugar, $imagen);
        return $añadir;

    }


    public function eliminarRecurso(){
        $id = $_POST['id'];
        $eliminarRecurso = $this -> recursosModel -> eliminarRecursos($id);
    }


    public function buscarRecurso(){
        $busqueda = $_POST['busqueda'];
        $busqueda = $this -> recursosModel -> buscarRecursos($busqueda);

        
        foreach($busqueda as $recurso){
            $id           = $recurso['id'];
            $nombre       = $recurso['nombre'];
            $descripcion  = $recurso['descripcion'];
            $localizacion = $recurso['localizacion'];
            $imagen       = $recurso['imagen'];

            echo "<tr>";
                echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
                echo "<td class='p-3'>$nombre</td>";
                echo "<td class='p-3'>$descripcion</td>";
                echo "<td class='p-3'>$localizacion</td>";
                echo "<td class='p-3'>$imagen</td>";
                echo "<td class='p-3'><a class='btn btn-success'>Editar</a></td>";
                echo "<td class='p-3'><a class='btn btn-danger'>Eliminar</a></td>";
            echo "</tr>";
            
        }    
    }


    public function modificarRecurso(){
        $campo = $_POST['campo'];
        $valor = $_POST['valor'];
        $id = $_POST['id'];

        $modificar = $this -> recursosModel -> actualizarRecursos($campo, $valor, $id);
    }

}