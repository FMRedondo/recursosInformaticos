<?php

require_once("models/reservas.php");
require_once("views/reservas.php");

require_once("controllers/recursosController.php");
require_once("controllers/usersController.php");
require_once("controllers/tramosHorariosController.php");

class ReservasController{

public function __construct()
{
    $this -> reservasModel = new ReservasModel();
    $this -> recursos = new recursosController();
    $this -> usuarios = new usersController();
    $this -> tramos = new TramosHorariosController();
}

public function verVista(){
    $verReservas = new Reservas();
    $verReservas -> pintarReservas();
}


public function añadirReserva(){
    $idRecurso = $_POST['idRecurso'];
    $idUsuario = $_POST['idUsuario'];
    $idTramo = $_POST['idTramo'];
    $fecha = $_POST['fecha'];
    $comentario = $_POST['comentario'];

    $añadirReserva = $this -> reservasModel -> añadirReserva($idRecurso, $idUsuario, $idTramo, $fecha, $comentario);
    echo $añadirReserva;
}

public function eliminarReserva(){
    $id = $_POST['id'];
    $eliminar = $this -> reservasModel -> eliminarReserva($id);
}

public function buscarReserva(){
    $busqueda = $_POST['busqueda'];
    $busquedaReserva = $this -> reservasModel -> buscarReservas($busqueda);

    foreach($busquedaReserva as $reserva){
        $id = $reserva['id'];
        $idRecurso = $reserva['idRecurso'];
        $idUsuario = $reserva['idUsuario'];
        $idTramoHorario = $reserva['idTramoHorario'];
        $fecha = $reserva['fecha'];
        $comentarios = $reserva['comentarios'];

        echo "<tr id='$id'>";
            echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
            echo "<td class='p-3 nombre'>$idRecurso</td>";
            echo "<td class='p-3 descripcion'>$idUsuario</td>";
            echo "<td class='p-3 localizacion'>$idTramoHorario</td>";
            echo "<td class='p-3'>$fecha</td>";
            echo "<td class='p-3'>$comentarios</td>";
            echo "<td class='p-3'><a class='btn btn-success mostrarEditarRecurso' data-id='$id'>Editar</a></td>";
            echo "<td class='p-3'><a class='btn btn-danger eliminarRecursos' data-id='$id'>Eliminar</a></td>";
        echo "</tr>";
    }
}

public function mostrarModificarReservas(){
    $id = $_POST['id'];
    $reservas = $this -> reservasModel -> buscarReserva($id);

    foreach($reservas as $reserva){
        $id = $reserva['id'];
        $idReserva = $id;
        $idRecurso = $reserva['idRecurso'];
        $idUsuario = $reserva['idUsuario'];
        $idTramoHorario = $reserva['idTramoHorario'];
        $fecha = $reserva['fecha'];
        $comentarios = $reserva['comentarios'];

        $nombreRecurso = $this -> recursos -> nombreRecurso($idRecurso);
        $nombreUsuario = $this -> usuarios -> nombreUsuario($idUsuario);
        $nombreTramoHorario = $this -> tramos -> nombreTramo($idTramoHorario);

        echo "<form id='formularoAñadir' method='post'>";
            echo "<div class='form-group mb-4'>";
                echo "<label class='mb-2''>Recursos</label>";
                echo "<select class='form-select cambiarIdRecurso'>";
                        $recursos = $this -> recursos -> verRecursos();
                        foreach($recursos as $recurso){
                            $id = $recurso['id'];
                            $nombre = $recurso['nombre'];

                            if($nombre == $nombreRecurso){
                                echo "<option selected value='$idRecurso'>$nombreRecurso</option>";
                            }

                            else{
                                echo "<option value='$id'>$nombre</option>";
                            }
                           
                        }

                echo "</select>";
            echo "</div>";

            echo "<div class='form-group mb-4'>";
                echo "<label class='mb-2'>Usuario</label>";
                echo "<select class='form-select cambiarIdUsuario'>";
                            $usuarios = $this -> usuarios -> verUsuarios();
                            foreach($usuarios as $usuario){
                                $id = $usuario['id'];
                                $nombre = $usuario['name'];

                                if($nombreUsuario == $nombre){
                                    echo "<option value='$id' selected>$nombre</option>";
                                }

                                else{
                                    echo "<option value='$id'>$nombre</option>";
                                }
                                
                            }

                echo "</select>";
            echo "</div>";

            echo "<div class='form-group mb-4'>";
                echo "<label class='mb-2'>Tramo Horario</label>";       
                echo "<select class='form-select cambiarIdTramo'>";
                            $tramos = $this -> tramos -> listarTramos();
                            foreach($tramos as $tramos){
                                $id = $tramos['id'];
                                $dia = $tramos['diaSemana'];
                                $inicio = $tramos['horaInicio'];
                                $fin = $tramos['horaFin'];

                                $nombreTramo = $dia ." ". $inicio ." ". $fin;

                                if($nombreTramo == $nombreTramoHorario){
                                    echo "<option value='$id' selected>$nombreTramo</option>";
                                }
                                else{
                                    echo "<option value='$id'>$nombreTramo</option>";
                                }
                               
                            }

                echo "</select>";
            echo "</div>";

            echo "<div class='form-group mb-4'>";
                echo "<label class='mb-2''>Fecha</label>";
                    echo "<input type='date' class='form-control cambiarFechaReserva' value='$fecha'>";
            echo "</div>";

            echo "<div class='form-group mb-4'>";
                echo "<label class='mb-2''>Comentarios</label>";
                echo "<textarea type='date' class='form-control cambiarComentarios' rows='4'>$comentarios</textarea>";
            echo "</div>";

                    
            echo "<div class='form-group mb-4'>";
                echo "<input type='submit' class='actualizarReserva btn btn-primary' data-id='$idReserva' value='Editar reserva'>";
                echo "</div>";
            echo "</form>";
    }

    }

    public function modificarReserva(){
        $id = $_POST['id'];
        $idRecurso = $_POST['idRecurso'];
        $idUsuario = $_POST['idUsuario'];
        $idTramo = $_POST['idTramo'];
        $fecha = $_POST['fecha'];
        $comentario = $_POST['comentario'];

        $this -> reservasModel -> ModificarReserva($id, $idRecurso, $idUsuario, $idTramo, $fecha, $comentario);
    }
}
