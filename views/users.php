<?php

require_once("header.php");
require_once("../models/usuarios.php");

$usuarios = new Users();

class Users{

    public function __construct(){
        $this -> usersModel = new Usuarios();
        $this -> header = new Header();
        $this -> tablaAñadir();
        $this -> tablaEditar();
        $this -> pintarUsuarios();

    }

    public function pintarUsuarios(){
            echo "<body>";
            echo "<link rel='stylesheet' href='../assets/estilos/usuarios.css'>";
            echo "<div class='w-75 m-auto mt-5 d-flex justify-content-between'>";
                echo "<div class='w-75'>";
                    echo "<div class='col-auto'>";
                        echo "<div class='input-group mb-2'>";
                            echo "<input type='text' class='form-control busquedaUsuario' id='inlineFormInputGroup' placeholder='Buscar usuario'>";
                            echo "<div class='input-group-prepend'>";
                                echo "<div class='input-group-text p-3'><i class='fas fa-search'></i></div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='input-group-prepend w-5 botonAgregarUsuario'>";
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
                echo "<tbody class='infoUsuarios'>";
                    $vistaUsuarios = $this  -> usersModel -> listarUsuarios();

                    foreach($vistaUsuarios as $usuario){
                        $id         = $usuario['id'];
                        $email      = $usuario['email'];
                        $contraseña = $usuario['password'];
                        $foto       = $usuario['photo'];
                        $nombre     = $usuario['name'];
                        $telefono   = $usuario['phone'];
            
            
                        echo "<tr id='$id'>";
                            echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
                            echo "<td class='p-3 email'>$email</td>";
                            echo "<td class='p-3 password'>$contraseña</td>";
                            echo "<td class='p-3 photo'>$foto</td>";
                            echo "<td class='p-3 name'>$nombre</td>";
                            echo "<td class='p-3 phone'>$telefono</td>";
                            echo "<td class='p-3'><a class='btn btn-success mostrarEditarUsuario' data-id='$id'>Editar</a></td>";
                            echo "<td class='p-3'><a class='btn btn-danger eliminarUsuario' data-id='$id'>Eliminar</a></td>";
                        echo "</tr>";

                    }

                echo "</tbody>";
            echo "</table>";

            echo "<script src='../assets/js/usuarios.js'></script>";

        echo "</body>";
        echo "</html>";

    }


    public function tablaAñadir(){
        echo "<section class='panelAñadirUsuario'>";
                    echo "<h2 class='text-center mt-3'>Añadir usuario</h2>";
                    echo "<div class='contenido pt-0'>";
                       echo "<form id='formularoAñadir' method='post'>";
                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Email</label>";
                                echo "<input type='text' class='form-control añadirEmailUsuario' placeholder='Introduce el email del usuario' name='email'>";
                            echo "</div>";

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Contraseña</label>";
                                echo "<input type='text' class='form-control añadirContraseñaUsuario' placeholder='Introduce la contraseña del usuario' name='contraseña'>";
                            echo "</div>";

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Nombre</label>";
                                echo "<input type='text' class='form-control añadirNombreUsuario' placeholder='Introduce el nombre del usuario' name='nombre'>";
                            echo "</div>";

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Telefono</label>";
                                echo "<input type='text' class='form-control añadirTelefonoUsuario' placeholder='Introduce el telefono del usuario' name='telefono'>";
                            echo "</div>";
                            
                            
                            

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Imagen</label>";
                                echo "<input type='file' name='imagen' class='form-control añadirImagen' id='añadirImagenUsuario'>";
                            echo "</div>";
                            echo "<div class='form-group mb-4'>";
                                echo "<input type='submit' class='añadirUsuario btn btn-primary' id='añadirUsuario' value='añadir usuario'>";
                            echo "</div>";
                       echo "</form>";
                    echo "</div>";
                echo "</section>";
    }

    public function tablaEditar(){
        echo "<section class='panelEditarUsuarios'>";
        echo "<div class='cerrarVentana d-flex flex-row-reverse text-danger h2'>";
            echo "<i class='far fa-times-circle cerrarEditarUsuario'></i>";
        echo "</div>";
            echo "<h2 class='text-center mt-3'>Editar usuario</h2>";
            echo "<div class='contenidoEditarUsuario pt-0'>";

            echo "</div>";   
        echo "</section>";
    }






}