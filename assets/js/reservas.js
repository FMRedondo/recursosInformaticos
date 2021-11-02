$(".busquedaReserva").keyup(buscarReserva);

function buscarReserva(){
    var parametros = {
        "busqueda": $(this).val(),
    }


        $.ajax({

            data: parametros,
            url: '/reservas/search',
            type: 'post',
            
            success: function (response) {
               $(".infoReservas").empty();
               $(".infoReservas").append(response);

               $(".mostrarEditarReserva").click(mostrarEditarReserva);
               $(".eliminarReservas").click(eliminarReservass);
               $(".mostrarEditarReserva").click(mostrarEditarReserva);
               $(".cerrarEditarReserva").click(cerrarVentanaEditarReserva);

            },
            error: function (response) {
                alert("error en la peticion");
            }
        });

}

// añadir reserva

$('.botonAgregarReserva').click(function(){
    $(".panelAñadirReserva").toggle();
    $(".añadirReserva ").click(añadirReserva);
});

function añadirReserva(){
    
    var parametros = {
        "idRecurso": $(".idRecurso").val(),
        "idUsuario": $(".idUsuario").val(), 
        "idTramo": $(".idTramo").val(),
        "fecha": $(".fechaReserva").val(),
        "comentario" : $(".comentarios").val(),
     }

     

    $.ajax({

        data: parametros,
        url: '/reservas/add',
        type: 'post',
        
        success: function (response) {
           // mostramos el nuevo recurso por pantall
           
            if(response.length >= 0){
                alert(response);
            }

            $(".infoRecursos").empty();
           $(".infoRecursos").append(response);
        },

        error: function (response) {
            alert("error en la peticion. No se ha podido añadir el usuario");
        }
    });


}



// eliminarReservass

// funcion para eliminar reservas

$(".eliminarReservas").click(eliminarReservass);

function eliminarReservass(){
    var parametros = {
        "id": $(this).data('id'),
    }

        var id = $(this).data('id');

        $.ajax({

            data: parametros,
            url: '/reservas/delete',
            type: 'post',
            
            success: function (response) {
               // eliminamos el resultado de la pantalla
               var ruta = ".infoReservas #" + id;
                $(ruta).remove();

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });


}



$(".mostrarEditarReserva").click(mostrarEditarReserva);

function mostrarEditarReserva(){

    var parametros = {
        "id": $(this).data('id'),
    }

    $.ajax({
            data: parametros,
            url: '/reservas/Depedit',
            type: 'post',
            
            success: function (response) {
               // eliminamos el resultado de la pantalla
               $(".panelEditarReserva").toggle();
               $(".contenidoEditarReserva").empty();
               $(".contenidoEditarReserva").append(response);
               $(".actualizarReserva").click(editarReserva);

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });

}


// cerrar la ventana de editar reserva

$(".cerrarEditarReserva").click(cerrarVentanaEditarReserva);

function cerrarVentanaEditarReserva(){
    $(".panelEditarReserva").toggle();
}


// Editar Recurso

function editarReserva(){
    var parametros = {
        "id": $(this).data('id'),
        "idRecurso": $(".cambiarIdRecurso").val(),
        "idUsuario":$(".cambiarIdUsuario").val(),
        "idTramo":$(".cambiarIdTramo").val(),
        "fecha":  $(".cambiarFechaReserva").val(),
        "comentario": $(".cambiarComentarios").val(),
    }



    $.ajax({

            data: parametros,
            url: '/reservas/edit',
            type: 'post',
            
            success: function (response) {
                alert(response);

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });
}