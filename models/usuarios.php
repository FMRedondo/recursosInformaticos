<?php

require_once("conexion.php");

class Usuarios{

    public function __construct()
    {
        $this -> conexion = new MySQLDB();
    }

    public function listarUsuarios(){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM users";
        $usuarios = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $usuarios;
    }

    public function buscarUsuario($id){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM users WHERE (id = $id)";
        $usuario = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $usuario;
    }

    public function buscarUsuarios($busqueda){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM users WHERE email LIKE '%$busqueda%' OR name LIKE '%$busqueda%' OR phone LIKE '%$busqueda%'";
        $usuarios = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $usuarios;
    }

    public function eliminarUsuario($id){
        $this -> conexion -> conectar();
        $sql = "DELETE FROM users WHERE (id = $id)";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
    }
    
    public function editarUsuario($id, $campo, $valor){
        $this -> conexion -> conectar();
        $sql = "UPDATE users SET $campo = '$valor' WHERE id = $id";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
    }

    public function crearUsuario($email, $contraseña, $nombre, $telefono){
        $this -> conexion -> conectar();
        $sql = "INSERT INTO users (email, password, name, phone) VALUES ('$email', '$contraseña', '$nombre', '$telefono')";
        $this -> conexion -> ejecutarSQL($sql);
        $ultimoID = $this -> conexion -> obtenerUltimoId();
        $this -> conexion -> cerrar();
        return $this -> listarUsuarios();
    }


}