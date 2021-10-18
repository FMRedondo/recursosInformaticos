<?php

require_once("header.php");
require_once("../controllers/usersController.php");

$recursos = new Recursos();

class Recursos{

    public function __construct(){
        $this -> usersController = new usersController();
        $this -> header = new Header();
        //$this -> tablaAñadir();
        //$this -> tablaEditar();
        $this -> pintarUsuarios();

    }

    public function pintarUsuarios(){
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
                        echo "<th class='p-3' scope='col'>Email</th>";
                        echo "<th class='p-3' scope='col'>Contraseña</th>";
                        echo "<th class='p-3' scope='col'>Foto</th>";
                        echo "<th class='p-3' scope='col'>Nombre</th>";
                        echo "<th class='p-3' scope='col'>Teléfono</th>";
                        echo "<th class='p-3' scope='col'></th>";
                        echo "<th class='p-3' scope='col'></th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody class='infoRecursos'>";
                    $vistaUsuarios = $this -> usersController -> verUsuarios();

                    foreach($vistaUsuarios as $usuario){
                        $id         = $usuario['id'];
                        $email      = $usuario['email'];
                        $contraseña = $usuario['password'];
                        $foto       = $usuario['photo'];
                        $nombre     = $usuario['name'];
                        $telefono   = $usuario['phone'];
            
            
                        echo "<tr>";
                            echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
                            echo "<td class='p-3'>$email</td>";
                            echo "<td class='p-3'>$contraseña</td>";
                            echo "<td class='p-3'>$foto</td>";
                            echo "<td class='p-3'>$nombre</td>";
                            echo "<td class='p-3'>$telefono</td>";
                            echo "<td class='p-3'><a class='btn btn-success'>Editar</a></td>";
                            echo "<td class='p-3'><a class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";

                    }

                echo "</tbody>";
            echo "</table>";

            echo "<script src='../assets/js/recursos.js'></script>";

        echo "</body>";
        echo "</html>";

    }

}