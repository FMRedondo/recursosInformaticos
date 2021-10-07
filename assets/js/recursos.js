// Función para buscar un recurso

$(".inputBusqueda").keyup(buscarPelicula);

function buscarPelicula(){

    var parametros = {
        "busqueda": $(".inputBusqueda").val(),
    }

    $.ajax({
        data: parametros,
        url: '../assets/js/ajax/buscarRecurso.ajax.php',
        type: 'post',

        beforeSend: function () {
            $(".infoRecursos").empty();
        },
        success: function (response) {
            $(".infoRecursos").append(response);
        },
        error: function (response) {

        }

    });



}

// funcion para agregar un recurso

