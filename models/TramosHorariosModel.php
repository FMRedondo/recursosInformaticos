<?php

require_once("conexion.php");


class TramosHorariosModel{

    public function __construct()
    {
        $this -> conexion = new MySQLDB();
    }
    

    public function listarHorarios(){
        $this -> conexion -> conectar();
        $sql = "SELECT * from tramoshorarios";
        $tramosHorarios = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $tramosHorarios;
    }

    public function buscarHorarios($busqueda){
        $this -> conexion -> conectar();
        $sql = "SELECT * from tramoshorarios WHERE diaSemana LIKE '%$busqueda%' OR horaInicio LIKE '%$busqueda%' OR horaFin LIKE '$busqueda'";
        $horarios = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $horarios;
    }

    public function eliminarHorario($id){
        $this -> conexion -> conectar();
        $sql = "DELETE FROM tramoshorarios WHERE (id = $id)";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
    }

    public function crearHorario($dia, $horaIni, $horaFin){
        $this -> conexion -> conectar();
        $sql = "INSERT INTO tramoshorarios (diaSemana, horaInicio, horaFin) VALUES ('$dia', '$horaIni', '$horaFin')";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
    }

    public function editarHorario($id, $campo, $valor){
        $this -> conexion -> conectar();
        $sql = "UPDATE tramoshorarios SET $campo = '$valor' WHERE id = $id";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
    }

    public function buscarHorario($id){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM tramoshorarios WHERE (id = $id)";
        $tramo = $this -> conexion -> ejecutarSQL($sql);
        return $tramo;
    }

}