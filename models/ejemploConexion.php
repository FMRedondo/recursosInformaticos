<?php
 
class MySQLDB
{
 
    private $host;
    private $usuario;
    private $pass;
    private $db;
 
    private $connection;
 
    function __construct()
    {
        $this->host = "servidor";
        $this->usuario = "usuario";
        $this->pass = "contraseña";
        $this->db = "base de datos";
    }
 
    function conectar(){
         
            $this->connection = mysqli_connect(
            $this->host,
            $this->usuario,
            $this->pass,
            $this->db
        );
 
        $this -> connection -> set_charset("utf8");
 
        if (mysqli_connect_errno()) {
            print("error al conectarse");
        }
    }
 
    function obtenerInformacion($sql)
    {
        $data = array();
        $resultado = mysqli_query($this -> connection, $sql);
 
        $error = mysqli_error($this -> connection);
 
        if (empty($error)) {
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    array_push($data, $row);
                }
            }
        } else {
            throw new Exception($error);
        }
        return $data;
    }
 
    
 
    function ejecutarSQL($sql)
    {
        $conectado = mysqli_query($this -> connection, $sql);
 
        $error = mysqli_error($this -> connection);
 
        if (empty($error)) {
            return $conectado;
        } else {
            throw new Exception($error);
        }
    }
 
    function cerrar()
    {
        mysqli_close($this -> connection);
    }
 
    function obtenerUltimoId()
    {
        return mysqli_insert_id($this -> connection);
    }
}