<?php

require_once("controllers/recursosController.php");
require_once("controllers/usersController.php");
require_once("controllers/tramosHorariosController.php");

class Reservas{
    public function __construct()
    {
       $this -> reservasModel = new ReservasModel();
       $this -> recursos = new recursosController();
       $this -> usuarios = new usersController();
       $this -> tramos = new TramosHorariosController();
    }

    public function pintarReservas(){
      echo "<body>";
            echo "<link rel='stylesheet' href='../assets/estilos/reservas.css'>";
            echo "<div class='w-75 m-auto mt-5 d-flex justify-content-between'>";
                echo "<div class='w-75'>";
                    echo "<div class='col-auto'>";
                        echo "<div class='input-group mb-2'>";
                            echo "<input type='text' class='form-control inputBusqueda busquedaReserva' id='inlineFormInputGroup' placeholder='Buscar Reservass'>";
                            echo "<div class='input-group-prepend'>";
                                echo "<div class='input-group-text p-3'><i class='fas fa-search'></i></div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='input-group-prepend w-5 botonAgregarReserva'>";
                    echo "<div class='input-group-text p-3 bg-primary text-white'><i class='fas fa-plus'></i></div>";
                echo "</div>";
            echo "</div>";

            echo "<table class='table table-striped w-75 m-auto mt-5'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class='p-3' scope='col'>#</th>";
                        echo "<th class='p-3' scope='col'>Recursos</th>";
                        echo "<th class='p-3' scope='col'>Usuario</th>";
                        echo "<th class='p-3' scope='col'>Tramo Horario</th>";
                        echo "<th class='p-3' scope='col'>Fecha</th>";
                        echo "<th class='p-3' scope='col'>Comentarios</th>";
                        echo "<th class='p-3' scope='col'></th>";
                        echo "<th class='p-3' scope='col'></th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody class='infoReservas'>";
                    $vistaReservas = $this -> reservasModel -> listarReservas();

                    foreach($vistaReservas as $reserva){
                        $id = $reserva['id'];
                        $idRecurso = $reserva['idRecurso'];
                        $idUsuario = $reserva['idUsuario'];
                        $idTramoHorario = $reserva['idTramoHorario'];
                        $fecha = $reserva['fecha'];
                        $comentarios = $reserva['comentarios'];


                        $nombreRecurso = $this -> recursos -> nombreRecurso($idRecurso);
                        $nombreUsuario = $this -> usuarios -> nombreUsuario($idUsuario);
                        $nombreTramos = $this -> tramos -> nombreTramo($idTramoHorario);

                        echo "<tr id='$id'>";
                            echo "<th class='p-3' scope='row' class='p-3'>$id</th>";
                            echo "<td class='p-3 nombre'>$nombreRecurso</td>";
                            echo "<td class='p-3 descripcion'>$nombreUsuario</td>";
                            echo "<td class='p-3 localizacion'>$nombreTramos</td>";
                            echo "<td class='p-3'>$fecha</td>";
                            echo "<td class='p-3'>$comentarios</td>";
                            echo "<td class='p-3'><a class='btn btn-success mostrarEditarReserva' data-id='$id'>Editar</a></td>";
                            echo "<td class='p-3'><a class='btn btn-danger eliminarReservas' data-id='$id'>Eliminar</a></td>";
                        echo "</tr>";
                    }

                echo "</tbody>";
            echo "</table>";

            $this -> tablaAñadir();
            $this -> tablaEditar();

            echo "<script src='../assets/js/reservas.js'></script>";

        echo "</body>";
        echo "</html>";
    }


    public function tablaAñadir(){
        echo "<section class='panelAñadirReserva'>";
                    echo "<h2 class='text-center mt-3'>Añadir Reserva</h2>";
                    echo "<div class='contenido pt-0'>";
                       echo "<form id='formularoAñadir' method='post'>";
                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Recursos</label>";
                               
                                echo "<select class='form-select idRecurso'>";
                                    echo "<option selected>Selecciona el recurso a reservar</option>";
                                    $recursos = $this -> recursos -> verRecursos();
                                    foreach($recursos as $recurso){
                                        $id = $recurso['id'];
                                        $nombre = $recurso['nombre'];

                                        echo "<option value='$id'>$nombre</option>";
                                    }

                                echo "</select>";
                            echo "</div>";

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2'>Usuario</label>";
                               
                                echo "<select class='form-select idUsuario'>";
                                    echo "<option selected>Selecciona el usuario</option>";
                                    $usuarios = $this -> usuarios -> verUsuarios();
                                    foreach($usuarios as $usuario){
                                        $id = $usuario['id'];
                                        $nombre = $usuario['name'];

                                        echo "<option value='$id'>$nombre</option>";
                                    }

                                echo "</select>";
                            echo "</div>";

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2'>Tramo Horario</label>";
                               
                                echo "<select class='form-select idTramo'>";
                                    echo "<option selected>Selecciona el tramo horario deseado</option>";
                                    $tramos = $this -> tramos -> listarTramos();
                                    foreach($tramos as $tramos){
                                        $id = $tramos['id'];
                                        $dia = $tramos['diaSemana'];
                                        $inicio = $tramos['horaInicio'];
                                        $fin = $tramos['horaFin'];

                                        echo "<option value='$id'>$dia $inicio $fin</option>";
                                    }

                                echo "</select>";
                            echo "</div>";

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Fecha</label>";
                               echo "<input type='date' class='form-control fechaReserva'>";
                            echo "</div>";

                            echo "<div class='form-group mb-4'>";
                                echo "<label class='mb-2''>Comentarios</label>";
                                echo "<textarea type='date' class='form-control comentarios' rows='4'></textarea>";
                            echo "</div>";

                            
                            echo "<div class='form-group mb-4'>";
                                echo "<input type='submit' class='añadirReserva btn btn-primary' id='añadirUsuario' value='añadir reserva'>";
                            echo "</div>";
                       echo "</form>";
                    echo "</div>";
                echo "</section>";
    }

    public function tablaEditar(){
        echo "<section class='panelEditarReserva'>";
        echo "<div class='cerrarVentana d-flex flex-row-reverse text-danger h2'>";
            echo "<i class='far fa-times-circle cerrarEditarReserva'></i>";
        echo "</div>";
            echo "<h2 class='text-center mt-3'>Editar Reserva</h2>";
            echo "<div class='contenidoEditarReserva pt-0'>";

            echo "</div>";   
        echo "</section>";
    }
}