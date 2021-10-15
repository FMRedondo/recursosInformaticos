<?php

require_once("header.php");
require_once("../models/recursos.php");

$recursos = new Recursos();

class Recursos{

    public function __construct(){
        $this -> RecursosController = new RecursosModel();
        $this -> header = new Header();
        $this -> tablaAñadir();
        $this -> tablaEditar();
        $this -> pintarRecursos();

    }

    public function pintarRecursos(){
            echo "<body>";
            echo "<link rel='stylesheet' href='../assets/estilos/recursos.css'>";
            echo "<div class='w-75 m-auto mt-5 d-flex justify-content-between'>";
                echo "<div class='w-75'>";
                    echo "<div class='col-auto'>";
                        echo "<div class='input-group mb-2'>";
                            echo "<input type='text' class='form-control inputBusqueda' id='inlineFormInputGroup' placeholder='Buscar recursos'>";
                            echo "<div class='input-group-prepend'>";
                                echo "<div class='input-group-text p-3'><i class='fas fa-search'></i></div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='input-group-prepend w-5 botonAgregarRecurso'>";
                    echo "<div class='input-group-text p-3 bg-primary text-white'><i class='fas fa-plus'></i></div>";
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
                echo "<tbody class='infoRecursos'>";
                    $vistaRecursos = $this -> RecursosController -> verRecursos();

                    foreach($vistaRecursos as $recurso){
                        $id = $recurso['id'];
                        $nombre = $recurso['nombre'];
                        $descripcion = $recurso['descripcion'];
                        $localizacion = $recurso['localizacion'];
                        $imagen = $recurso['imagen'];

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

                echo "</tbody>";
            echo "</table>";

            echo "<script src='../assets/js/recursos.js'></script>";

        echo "</body>";
        echo "</html>";

    }

    public function tablaAñadir(){

        echo "<section class='panelAñadirRecursos'>";
                    echo "<h2 class='text-center mt-3'>Añadir recurso</h2>";
                    echo "<div class='contenido pt-0'>";
                       echo "<form id='formularoAñadir' method='post'>";
                                echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Titulo</label>";
                                echo "<input type='text' class='form-control añadirNombreRecurso' placeholder='Introduce el nombre del recurso' name='nombre'>";
                            echo "</div>";
                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Descripción</label>";
                                echo "<input type='text' class='form-control añadirDescripcionRecurso' name='descripcion' placeholder='Introduce la descripcion del recurso'>";
                            echo "</div>";
                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Lugar</label>";
                                echo "<input type='text' class='form-control añadirLugarRecurso' name='lugar' placeholder='Introduce el lugar del recurso'>";
                            echo "</div>";
                            

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Imagen</label>";
                                echo "<input type='file' name='imagen' class='form-control añadirImagen' id='añadirImagenRecurso'>";
                            echo "</div>";
                            echo "<div class='form-group mb-4'>";
                                echo "<input type='submit' class='añadirRecurso btn btn-primary' id='añadirRecurso' value='Crear Recurso'>";
                            echo "</div>";
                       echo "</form>";
                    echo "</div>";
                echo "</section>";
    }

    public function tablaEditar(){

        echo "<section class='panelEditarRecursos'>";
        echo "<div class='cerrarVentana d-flex flex-row-reverse text-danger h2'>";
            echo "<i class='far fa-times-circle cerrarEditarRecurso'></i>";
        echo "</div>";
            echo "<h2 class='text-center mt-3'>Editar recurso</h2>";
            echo "<div class='contenidoEditarRecurso pt-0'>";

            echo "</div>";   
        echo "</section>";
    }

}