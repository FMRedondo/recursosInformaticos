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
    $(".panelAnyadirRecursos").toggle();
    $("#formularoAñadir").submit(añadirRecurso);
});


// funcion para añadir recurso

function añadirRecurso(){
    // validamos que todo los datos esten rellenos

    var nombreRecurso = $(".añadirNombreRecurso").val();
    var descripcion = $(".añadirDescripcionRecurso").val();
    var lugar = $(".añadirLugarRecurso").val();
    var imagen = $("#añadirImagenRecurso").files;

    if(nombreRecurso != "" || descripcion != "" || lugar != ""){
       // Si todos los ampos estan rellenos, realizamos la solicitud ajax

       var parametros = {
        "funcion": 'añadirRecurso',
        "nombre": nombreRecurso,
        "descripcion": descripcion, 
        "lugar": lugar,
    }

        $.ajax({

            data: parametros,
            url: '../../controllers/recursosController.php',
            type: 'post',
            
            success: function (response) {
               // mostramos el nuevo recurso por pantalla
             
                alert(response)
/*
                var recurso  = "<tr id='" + response + "'>";
                    recurso += "<th class='p-3' scope='row' class='p-3'>" + response + "</th>";
                    recurso += "<td class='p-3'>" + "ddd" + "</td>";
                    recurso += "<td class='p-3'>" + "dd" + "</td>";
                    recurso += "<td class='p-3'>" + "dd" + "</td>";
                    recurso += "<td class='p-3'>img/imagen.png</td>";
                    recurso += "<td class='p-3'><a class='btn btn-success'>Editar</a></td>";
                    recurso += "<td class='p-3'><a class='btn btn-danger'>Eliminar</a></td>";
                    recurso += "</tr>";
*/

               //$(".infoRecursos").append(recurso);
            },

            error: function (response) {
                alert("error en la peticion");
            }
    });

    }

    else{
        alert("Todos los campos son obligatorios");
    }
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

