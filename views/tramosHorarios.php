<?php

require_once("header.php");
require_once("models/TramosHorariosModel.php");


class TramosHorarios{

    public function __construct()
    {
        //$this -> header = new Header();
        $this -> horariosModel = new TramosHorariosModel();
    }

    public function pintarHorarios(){
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
                    echo "<th class='p-3' scope='col'>Día</th>";
                    echo "<th class='p-3' scope='col'>Hora Inicio</th>";
                    echo "<th class='p-3' scope='col'>Hora Fin</th>";
                    echo "<th class='p-3' scope='col'></th>";
                    echo "<th class='p-3' scope='col'></th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody class='infoUsuarios'>";
                $vistaHorarios = $this  -> horariosModel -> listarHorarios();

                foreach($vistaHorarios as $horario){
                    $id         = $horario['id'];
                    $dia      = $horario['diaSemana'];
                    $horaInicio = $horario['horaInicio'];
                    $horaFin       = $horario['horaFin'];
        
        
                    echo "<tr id='$id'>";
                        echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
                        echo "<td class='p-3 email'>$dia</td>";
                        echo "<td class='p-3 password'>$horaInicio</td>";
                        echo "<td class='p-3 photo'>$horaFin</td>";
                        echo "<td class='p-3'><a class='btn btn-success mostrarEditarUsuario' data-id='$id'>Editar</a></td>";
                        echo "<td class='p-3'><a class='btn btn-danger eliminarUsuario' data-id='$id'>Eliminar</a></td>";
                    echo "</tr>";

                }

            echo "</tbody>";
        echo "</table>";

        $this -> tablaAñadir();
        $this -> tablaEditar();
        
        echo "<script src='../assets/js/usuarios.js'></script>";

    echo "</body>";
    echo "</html>";
    }


    public function calendario(){
        echo "<div id='calendario'></div>";
        echo "<script src='assets/js/horarios.js'></script>";
        echo "<script src='assets/plugin/calendario/lib/main.js'></script>";
        echo "<link rel='stylesheet' href='assets/plugin/calendario/lib/main.css'>";
        echo "<link rel='stylesheet' href='assets/estilos/horarios.css'>";
        echo "<script src='assets/plugin/calendario/examples/js/theme-chooser.js'></script>";
        
    }

    public function tablaAñadir(){

    }

    public function tablaEditar(){

    }

}

?>

