// Función para buscar un recurso

$(".inputBusqueda").keyup(buscarRecurso);

function buscarRecurso(){
    var parametros = {
        "funcion": 'buscarRecurso',
        "busqueda": $(".inputBusqueda").val(),
    }

    $.ajax({
        data: parametros,
        url: '../../controllers/recursosController.php',
        type: 'post',

        success: function (response) {
            $(".infoRecursos").empty();
            $(".infoRecursos").append(response);
        },

        error: function (response) {
            alert("error en la peticion");
        }


    });
}

// funcion para visualizar el panel para añadir recursos

$('.botonAgregarRecurso').click(function(){
    $(".panelAñadirRecursos").toggle();
    $(".añadirRecurso ").click(añadirRecurso);
});


// funcion para añadir recurso

function añadirRecurso(){
    // validamos que todo los datos esten rellenos
    var nombreRecurso = $(".añadirNombreRecurso").val();
    var descripcion = $(".añadirDescripcionRecurso").val();
    var lugar = $(".añadirLugarRecurso").val();
    //var imagen = $("#añadirImagenRecurso").files;

    
       // Si todos los ampos estan rellenos, realizamos la solicitud ajax

       var parametros = {
            "funcion": 'añadirRecurso',
            "nombre": $(".añadirNombreRecurso").val(),
            "descripcion": $(".añadirDescripcionRecurso").val(), 
            "lugar": $(".añadirLugarRecurso").val(),
         }

        $.ajax({

            data: parametros,
            url: '../../controllers/recursosController.php',
            type: 'post',
            
            success: function (response) {
               // mostramos el nuevo recurso por pantall
               alert("aquiiiiiii");
                $(".infoRecursos").empty();
               $(".infoRecursos").append(response);
            },

            error: function (response) {
                alert("error en la peticion");
            }
        });
}


// funcion para eliminar recursos

$(".eliminarRecursos").click(eliminarRecurso);

function eliminarRecurso(){
   
    var id = $(this).data('id');

    var parametros = {
        "funcion": 'eliminarRecurso',
        "id": id,
    }

        $.ajax({

            data: parametros,
            url: '../../controllers/recursosController.php',
            type: 'post',
            
            success: function (response) {
               // eliminamos el resultado de la pantalla
               var ruta = ".infoRecursos #" + id;
                $(ruta).remove();

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });


}



$(".mostrarEditarRecurso").click(mostrarEditarRecurso);

function mostrarEditarRecurso(){

    var parametros = {
        "funcion": 'mostrarModificarRecurso',
        "id": $(this).data('id'),
    }

    $.ajax({

            data: parametros,
            url: '../../controllers/recursosController.php',
            type: 'post',
            
            success: function (response) {
               // eliminamos el resultado de la pantalla
               $(".panelEditarRecursos").toggle();
               $(".contenidoEditarRecurso").empty();
               $(".contenidoEditarRecurso").append(response);
               $(".EditarRecurso").change(editarRecurso);

            },
            error: function (response) {
                alert("error en la peticion");
            }
    });

}


// cerrar la ventana de editar recurso

$(".cerrarEditarRecurso").click(cerrarVentanaEditarRecurso);

function cerrarVentanaEditarRecurso(){
    $(".panelEditarRecursos").toggle();
    //$(".contenidoEditarRecurso").empty();
}


// Editar Recurso

function editarRecurso(){
    var parametros = {
        "funcion": 'modificarRecurso',
        "id": $(this).data('id'),
        "valor": $(this).val(),
        "campo":$(this).data('campo'),
    }

    var ruta = "#" + $(this).data('id') + " ." + $(this).data('campo');
    var valor = $(this).val();

    $.ajax({

            data: parametros,
            url: '../../controllers/recursosController.php',
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

