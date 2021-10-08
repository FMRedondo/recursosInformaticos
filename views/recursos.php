<?php

require_once("header.php");
require_once("../models/recursos.php");

$recursos = new Recursos();

class Recursos{

    public function __construct(){
        $this -> RecursosController = new RecursosModel();
        $this -> header = new Header();
        $this -> pintarRecursos();
        $this -> tablaAñadir();

    }

    public function pintarRecursos(){
            echo "<body>";
            echo "<link rel='stylesheet' href='/recursosInformaticos/assets/estilos/recursos.css'>";
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

                echo "</tbody>";
            echo "</table>";

            echo "<script src='/recursosInformaticos/assets/js/recursos.js'></script>";

        echo "</body>";
        echo "</html>";

    }

    public function tablaAñadir(){

        echo "<section class='panelAñadirRecursos'>";
                    echo "<h2 class='text-center mt-3'>Añadir recurso</h2>";
                    echo "<div class='contenido pt-0'>";
                       echo "<form id='formularoAñadir'>";
                                echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Titulo</label>";
                                echo "<input type='text' class='form-control añadirNombreRecurso' placeholder='Introduce el nombre del recurso'>";
                            echo "</div>";
                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Descripción</label>";
                                echo "<input type='text' class='form-control añadirDescripcionRecurso' placeholder='Introduce la descripcion del recurso'>";
                            echo "</div>";
                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Lugar</label>";
                                echo "<input type='text' class='form-control añadirLugarRecurso' placeholder='Introduce el lugar del recurso'>";
                            echo "</div>";
                            

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Imagen</label>";
                                echo "<input type='file' name='imagen' class='form-control añadirImagen' id='añadirImagen'>";
                            echo "</div>";
                            echo "<div class='form-group mb-4'>";
                                echo "<a class='añadirRecurso btn btn-primary' id='añadirRecurso'>Añadir Recurso</a>";
                            echo "</div>";
                       echo "</form>";
                    echo "</div>";
                echo "</section>";

    }

}