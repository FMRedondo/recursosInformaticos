<?php

require_once("models/recursos.php");
require_once("views/recursos.php");


class recursosController{

    public function __construct()
    {
        $this -> recursosModel = new RecursosModel();
        //$this -> obtenerFuncion();
    }

    public function obtenerFuncion(){
        $funcion = $_POST['funcion'];
        $this -> $funcion();
    }


    public function verVista(){
        $verRecursos = new Recursos();
        $verRecursos -> pintarRecursos();
    }

    public function verEditarRecurso(){
        
    }

    public function verRecursos(){
        $recursos = $this -> recursosModel -> verRecursos();
        return $recursos;
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

            echo "<tr id='$id'>";
                echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
                echo "<td class='p-3 nombre'>$nombre</td>";
                echo "<td class='p-3 descripcion'>$descripcion</td>";
                echo "<td class='p-3 localizacion'>$localizacion</td>";
                echo "<td class='p-3'>$imagen</td>";
                echo "<td class='p-3'><a class='btn btn-success mostrarEditarRecurso' data-id='$id'>Editar</a></td>";
                echo "<td class='p-3'><a class='btn btn-danger eliminarRecursos' data-id='$id'>Eliminar</a></td>";
            echo "</tr>";
            
        }    
    }


    public function modificarRecurso(){
        $campo = $_POST['campo'];
        $valor = $_POST['valor'];
        $id = $_POST['id'];

        $modificar = $this -> recursosModel -> actualizarRecursos($campo, $valor, $id);
    }

    public function mostrarModificarRecurso(){
        $id = $_POST['id'];
        $recursos = $this -> recursosModel -> buscarRecurso($id);

        foreach($recursos as $recurso){
            $id           = $recurso['id'];
            $nombre       = $recurso['nombre'];
            $descripcion  = $recurso['descripcion'];
            $localizacion = $recurso['localizacion'];
            $imagen       = $recurso['imagen'];

            echo "<form id='' method='post'>";
                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Titulo</label>";
                    echo "<input type='text' class='form-control EditarRecurso ' value='$nombre' name='nombre' data-id='$id' data-campo='nombre'>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Descripción</label>";
                    echo "<input type='text' class='form-control EditarRecurso ' name='descripcion' value='$descripcion' data-id='$id' data-campo='descripcion'>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Lugar</label>";
                    echo "<input type='text' class='form-control EditarRecurso ' name='lugar' value='$localizacion' data-id='$id' data-campo='localizacion'>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Imagen</label>";
                    echo "<input type='file' name='imagen' class='form-control añadirImagen' id='añadirImagenRecurso'>";
                echo "</div>";
            echo "</form>";
            
        } 

    }

    public function nombreRecurso($id){
        $recurso = $this -> recursosModel -> buscarRecurso($id);
        foreach($recurso as $nombre){
            $nombre = $nombre['nombre'];
            return $nombre;
        }

    }

}