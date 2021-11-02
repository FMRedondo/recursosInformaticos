<?php

require_once("models/usuarios.php");
require_once("views/users.php");
//require_once("models/security.php");



class usersController{

    public function __construct()
    {
        $this -> userModel = new Usuarios();    
        //$this -> obtenerFuncion();
    }

    public function verVista(){
        $usuarios = new Users();
        $usuarios -> pintarUsuarios();
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
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];

        $this -> userModel -> crearUsuario($email, $contraseña, $nombre, $telefono);

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

    public function nombreUsuario($id){
        $usuarios = $this -> userModel -> buscarUsuario($id);

        foreach($usuarios as $usuario){
            $nombre = $usuario['name'];
            return $nombre;
        }
    }

/*

    public function procesarLogin()
    {
        // Validación del formulario

        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];

        if (Security::filter($email) == "" || Security::filter($contraseña) == "") {
            // Algún campo del formulario viene vacío: volvemos a mostrar el login
            $data['errorMsg'] = "El email y la contraseña son obligatorios";
            $this->view->show("loginForm", $data);
        }
        else {
            // Hemos pasado la validación del formulario: vamos a procesarlo
            $email = Security::filter($email);
            $pass = Security::filter($contraseña);
            $userData = $this -> user -> checkLogin($email, $pass);
            if ($userData!=null) {
                // Login correcto: creamos la sesión y pedimos al usuario que elija su rol
                Security::createSession($userData->id);
                //$this->SelectUserRolForm();
            }
            else {
                $data['errorMsg'] = "Usuario o contraseña incorrectos";
                $this->view->show("loginForm", $data);
            }
        }
    }

    */

}