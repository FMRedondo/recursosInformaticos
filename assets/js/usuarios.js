$(".eliminarUsuario").click(eliminarUsario);

function eliminarUsario(){

    id = $(this).data('id');

    var parametros = {
        "funcion": 'eliminarUsuario',
        "id": $(this).data('id'),
    }

        $.ajax({

            data: parametros,
            url: '../../controllers/usersController.php',
            type: 'post',
            
            success: function (response) {
               // eliminamos el resultado de la pantalla
               var ruta = ".infoUsuarios #" + id;
                $(ruta).remove();

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });
}

$(".busquedaUsuario").keyup(buscarUsuario);

function buscarUsuario(){
    var parametros = {
        "funcion": 'buscarUsuario',
        "busqueda": $(this).val(),
    }

        $.ajax({

            data: parametros,
            url: '../../controllers/usersController.php',
            type: 'post',
            
            success: function (response) {
               $(".infoUsuarios").empty();
               $(".infoUsuarios").append(response);

               $(".eliminarUsuario").click(eliminarUsario);

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });
}

// añadir usuario

$('.botonAgregarUsuario').click(function(){
    $(".panelAñadirUsuario").toggle();
    $(".añadirUsuario ").click(añadirRecurso);
});

// Editar usuarios

$(".mostrarEditarUsuario").click(mostrarEditarUsuario);

function mostrarEditarUsuario(){

    var parametros = {
        "funcion": 'mostrarModificarUsuario',
        "id": $(this).data('id'),
    }

    $.ajax({

            data: parametros,
            url: '../../controllers/usersController.php',
            type: 'post',
            
            success: function (response) {
               // eliminamos el resultado de la pantalla
               $(".panelEditarUsuarios").toggle();
               $(".contenidoEditarUsuario").empty();
               $(".contenidoEditarUsuario").append(response);
               $(".editarUsuario").change(editarUsuario);

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });

}

function editarUsuario(){

    var parametros = {
        "funcion": 'modificarUsuario',
        "id": $(this).data('id'),
        "valor": $(this).val(),
        "campo":$(this).data('campo'),
    }

    var ruta = "#" + $(this).data('id') + " ." + $(this).data('campo');
    alert(ruta)
    var valor = $(this).val();

    $.ajax({

            data: parametros,
            url: '../../controllers/usersController.php',
            type: 'post',
            
            success: function (response) {
               // eliminamos el resultado de la pantalla
               $(ruta).empty();
               $(ruta).append(valor);

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });
}



// Cerrar ventana editar usuario

$(".cerrarEditarUsuario").click(cerrarVentanaEditarUsuario);

function cerrarVentanaEditarUsuario(){
    $(".panelEditarUsuarios").toggle();
    //$(".contenidoEditarRecurso").empty();
}

