<?php

require_once("../models/user.php");

$usersContollers = new usersController();


class usersController{

    public function __construct()
    {
        $usersModel = new Ususarios();
        $this -> obtenerFuncion();
    }


    public function obtenerFuncion(){
        $funcion = $_POST['funcion'];
        $this -> $funcion();
    }

    public function añadirUsuario(){

        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $foto = $_POST['foto'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];

        $this -> usersModel -> añadirUsuario($email, $contraseña, $foto, $nombre, $telefono);

    }

    public function eliminarUsuario(){
        $id = $_POST['id'];
        $this -> usersModel -> eliminarUsuario($id);
    }

    public function buscarUsuario(){
        $busqueda = $_POST['busqueda'];
        $busquedaUsuario = $this -> usersModel -> buscarUsuarios($busqueda);

        foreach($busquedaUsuario as $usuario){
            $id = $usuario['id'];
            $email = $usuario['email'];
            $contraseña = $_POST['password'];
            $foto = $usuario['photo'];
            $nombre = $usuario['name'];
            $telefono = $_POST['phone'];


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

        $this -> usersModel -> editarUsuario($id, $campo, $valor);
    }


}