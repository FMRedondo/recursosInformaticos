$(".eliminarUsuario").click(eliminarUsario);

function eliminarUsario(){

    id = $(this).data('id');

    var parametros = {
        "funcion": 'eliminarUsuario',
        "id": $(this).data('id'),
    }

        $.ajax({

            data: parametros,
            url: 'usuarios/delete',
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
        "busqueda": $(this).val(),
    }

        $.ajax({

            data: parametros,
            url: 'usuarios/search',
            type: 'post',
            
            success: function (response) {
               $(".infoUsuarios").empty();
               $(".infoUsuarios").append(response);

               $(".mostrarEditarUsuario").click(mostrarEditarUsuario);
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
    $(".añadirUsuario ").click(añadirUsuario);
});


function añadirUsuario(){

       var parametros = {
            "email": $(".añadirEmailUsuario").val(),
            "contraseña": $(".añadirContraseñaUsuario").val(), 
            "nombre": $(".añadirNombreUsuario").val(),
            "telefono": $(".añadirTelefonoUsuario").val(),
         }
         

        $.ajax({

            data: parametros,
            url: 'usuarios/add',
            type: 'post',
            
            success: function (response) {
               // mostramos el nuevo recurso por pantall
               alert(response)
                $(".infoRecursos").empty();
               $(".infoRecursos").append(response);
            },

            error: function (response) {
                alert("error en la peticion. No se ha podido añadir el usuario");
            }
        });
}

// Editar usuarios

$(".mostrarEditarUsuario").click(mostrarEditarUsuario);

function mostrarEditarUsuario(){

    var parametros = {
        "id": $(this).data('id'),
    }

    $.ajax({

            data: parametros,
            url: 'usuarios/Depedit',
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
    var valor = $(this).val();

    $.ajax({

            data: parametros,
            url: 'usuarios/edit',
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

