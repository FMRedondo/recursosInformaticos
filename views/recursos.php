<?php

require_once("header.php");
require_once("../models/recursos.php");

$recursos = new Recursos();

class Recursos{

public function __construct(){
    $this -> RecursosController = new RecursosController();
    $this -> header = new Header();
    $this -> pintarRecursos();

}

public function pintarRecursos(){
        echo "<body>";

        echo "<div class='w-75 m-auto mt-5'>";
            echo "<div class='col-auto'>";
                echo "<div class='input-group mb-2'>";
                    echo "<input type='text' class='form-control inputBusqueda' id='inlineFormInputGroup' placeholder='Buscar recursos'>";
                    echo "<div class='input-group-prepend'>";
                        echo "<div class='input-group-text p-3'><i class='fas fa-search'></i></div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

        echo "<table class='table table-striped w-75 m-auto mt-5'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th class='p-3' scope='col'>#</th>";
                    echo "<th class='p-3' scope='col'>Nombre</th>";
                    echo "<th class='p-3' scope='col'>Descripción</th>";
                    echo "<th class='p-3' scope='col'>Lugar</th>";
                    echo "<th class='p-3' scope='col'>imagen</th>";
                    echo "<th class='p-3' scope='col'></th>";
                    echo "<th class='p-3' scope='col'></th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                $vistaRecursos = $this -> RecursosController -> verRecursos();

                foreach($vistaRecursos as $recurso){
                    $id = $recurso['id'];
                    $nombre = $recurso['nombre'];
                    $descripcion = $recurso['descripcion'];
                    $localizacion = $recurso['localizacion'];
                    $imagen = $recurso['imagen'];

                    echo "<tr'>";
                        echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
                        echo "<td class='p-3'>$nombre</td>";
                        echo "<td class='p-3'>$descripcion</td>";
                        echo "<td class='p-3'>$localizacion</td>";
                        echo "<td class='p-3'>$imagen</td>";
                        echo "<td class='p-3'><a class='btn btn-success'>Editar</a></td>";
                        echo "<td class='p-3'><a class='btn btn-danger'>Eliminar</a></td>";
                    echo "</tr>";
                }

            echo "</tbody>";
        echo "</table>";

        echo "<script src='/recursosInformaticos/assets/js/recursos.js'></script>";

    echo "</body>";
    echo "</html>";

}




}