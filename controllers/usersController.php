<?php

require_once("../models/usuarios.php");

$usersContollers = new usersController();


class usersController{

    public function __construct()
    {
        $this -> userModel = new Usuarios();    
        $this -> obtenerFuncion();
    }


    public function obtenerFuncion(){
        $funcion = $_POST['funcion'];
        $this -> $funcion();
    }

    public function verUsuarios(){
        $verUsuarios = $this -> userModel -> listarUsuarios();
        return $verUsuarios;
    }

    public function añadirUsuario(){

        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $foto = $_POST['foto'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];

        $this -> userModel -> añadirUsuario($email, $contraseña, $foto, $nombre, $telefono);

    }

    public function eliminarUsuario(){
        $id = $_POST['id'];
        $this -> userModel -> eliminarUsuario($id);
    }

    public function buscarUsuario(){
        $busqueda = $_POST['busqueda'];
        $busquedaUsuario = $this -> userModel -> buscarUsuarios($busqueda);

        foreach($busquedaUsuario as $usuario){
            $id = $usuario['id'];
            $email = $usuario['email'];
            $contraseña = $usuario['password'];
            $foto = $usuario['photo'];
            $nombre = $usuario['name'];
            $telefono = $usuario['phone'];


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

    }


    public function modificarUsuario(){
        $id = $_POST['id'];
        $campo = $_POST['campo'];
        $valor = $_POST['valor'];

        $this -> userModel -> editarUsuario($id, $campo, $valor);
    }


    public function mostrarModificarUsuario(){
        $id = $_POST['id'];
        $usuarios = $this -> userModel -> buscarUsuario($id);

        foreach($usuarios as $usuario){
            $id         = $usuario['id'];
            $email      = $usuario['email'];
            $contraseña = $usuario['password'];
            $foto       = $usuario['photo'];
            $nombre     = $usuario['name'];
            $telefono   = $usuario['phone'];

            echo "<form id='' method='post'>";
                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Email</label>";
                    echo "<input type='text' class='form-control editarUsuario ' value='$email' name='email' data-id='$id' data-campo='email'>";
                echo "</div>";

                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Contraseña</label>";
                    echo "<input type='text' class='form-control editarUsuario ' value='$contraseña' name='password' data-id='$id' data-campo='password'>";
                echo "</div>";

                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Nombre</label>";
                    echo "<input type='text' class='form-control editarUsuario ' value='$nombre' name='name' data-id='$id' data-campo='name'>";
                echo "</div>";

                echo "<div class='form-group mb-4'>";
                    echo "<label class='mb-2''>Telefono</label>";
                    echo "<input type='text' class='form-control editarUsuario ' value='$telefono' name='phone' data-id='$id' data-campo='phone'>";
                echo "</div>";
                
                
            echo "</form>";
            
        } 

    }

}