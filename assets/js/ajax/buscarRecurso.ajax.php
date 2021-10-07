<?php

require_once("../../../models/recursos.php");

$buscarRecurso = new BuscarRecurso();

class BuscarRecurso{

    public function __construct(){
        $this -> recursos = new RecursosModel();
        $this -> obtenerParametros();
        $this -> ejecutar($this -> busqueda);
    }

    public function obtenerParametros(){
        $this -> busqueda = $_POST['busqueda'];
    }

    public function ejecutar($busqueda){
    
            $recursos = $this -> recursos -> buscarRecursos($busqueda);
            foreach($recursos as $recurso){
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

}