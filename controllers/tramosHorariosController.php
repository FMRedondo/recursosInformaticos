<?php

require_once("models/TramosHorariosModel.php");
require_once("views/tramosHorarios.php");

class TramosHorariosController{

    public function __construct()
    {
        $this -> horariosModel = new TramosHorariosModel();
        $this -> horario = new TramosHorarios();
    }

    public function verVista(){
       
        $this -> horario -> pintarHorarios();
    }

    public function añadirHorario(){
        $dia = $_POST['dia'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];

        $añadir = $this -> horariosModel -> crearHorario($dia, $horaInicio, $horaFin);
        return $añadir;
    }

    public function listarTramos(){
        $tramos = $this -> horariosModel -> listarHorarios();
        return $tramos;
    }

    public function eliminarHorario(){
        $id = $_POST['id'];
        $eliminarHorario = $this -> horariosModel -> eliminarHorario($id);
    }

    public function buscarHorario(){
        $busqueda = $_POST['busqueda'];
        $miBusqueda = $this -> horariosModel -> buscarHorario($busqueda);

        //aqui forarch para mostrar la busqueda y no tratarlo en js


    }


    public function modificarHorario(){
        $id = $_POST ['id'];
        $valor = $_POST['valor'];
        $campo = $_POST['campo'];

        $modificar = $this -> horariosModel -> editarHorario($id, $campo, $valor);
    }

    public function mostrarModificarHorario(){
        $id = $_POST['id'];

        // aqui va el contenido de buscar el recurso


    }

    public function verCalendario(){
        $this -> horario -> calendario();
    }

    public function nombreTramo($id){
        $nombre = $this -> horariosModel -> buscarHorario($id);

        foreach($nombre as $tramo){
            $dia = $tramo['diaSemana'];
            $inicio = $tramo['horaInicio'];
            $fin = $tramo['horaFin'];

            $nombre = $dia ." ". $inicio ." ". $fin;
            return $nombre;
        }
        
    }



}