<?php

require_once("conexion.php");

class ReservasModel{

    public function __construct()
    {
        $this -> conexion = new MySQLDB();
    }

    public function listarReservas(){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM reservas";
        $reservas = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $reservas;
    }

    public function buscarReservas($busqueda){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM reservas WHERE idUsuario LIKE '%$busqueda%' OR idRecurso LIKE '%$busqueda%' OR idTramoHorario LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR comentarios LIKE '%$busqueda%'"; 
        $busqueda = $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $busqueda;
    }

    public function buscarReserva($id){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM reservas WHERE (id = $id)";
        $busqueda =  $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
        return $busqueda;
    }

    public function eliminarReserva($idReserva){
        $this -> conexion -> conectar();
        $sql = "DELETE FROM reservas WHERE (id = $idReserva)";
        $this -> conexion -> ejecutarSQL($sql);
        $this -> conexion -> cerrar();
    }


    public function comprobarReserva($idRecurso, $idTramo, $fecha){
        $this -> conexion -> conectar();
        $sql = "SELECT * FROM reservas WHERE idRecurso = $idRecurso AND idTramoHorario = $idTramo AND fecha = '$fecha' ";
        $numColumnas = $this -> conexion -> numeroColumnas($sql);
        if ($numColumnas != 0){
            return false;
        }

        else{
            return true;
        }

        $this -> conexion -> cerrar();
    }

    public function añadirReserva($idRecurso, $idUsuario, $idTramo, $fecha, $comentario){
        $comprobar = $this -> comprobarReserva($idRecurso, $idTramo, $fecha);
        if($comprobar){
            $this -> conexion -> conectar();
            $sql = "INSERT INTO reservas (idRecurso, idUsuario, idTramoHorario, fecha, comentarios) VALUES($idRecurso,$idUsuario, $idTramo, '$fecha', '$comentario')";
            $this -> conexion -> ejecutarSQL($sql);
            //$ultimoID = $this -> conexion -> obtenerUltimoId();
            $this -> conexion -> cerrar();
            //return $ultimoID;
        }

        else{
            return "No se puede registrar esta reserva";
        }
    }

    public function ModificarReserva($id, $idRecurso, $idUsuario, $idTramo, $fecha, $comentario){
        $comprobar = $this -> comprobarReserva($idRecurso, $idTramo, $fecha);

        if($comprobar){
            $this -> conexion -> conectar();
            $sql = "UPDATE reservas SET idRecurso = $idRecurso, idUsuario = $idUsuario, idTramoHorario = $idTramo, fecha = '$fecha', comentarios = '$comentario' WHERE (id = $id)";
            $this -> conexion -> ejecutarSQL($sql);
            $this -> conexion -> cerrar();
        }

        else{
            return "No se puede actualizar esta reserva";
        }
    }

}
