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

        success: function (response) {
            $(".infoRecursos").empty();
            $(".infoRecursos").append(response);
        },

    });



}

// funcion para visualizar el panel para añadir recursos

$('.botonAgregarRecurso').click(function(){
    $(".panelAñadirRecursos").toggle();
    $("#añadirRecurso").click(añadirRecurso);
});


// funcion para añadir recurso

function añadirRecurso(){
    // validamos que todo los datos esten rellenos

    var nombreRecurso = $(".añadirNombreRecurso").val();
    var descripcion = $(".añadirDescripcionRecurso").val();
    var lugar = $(".añadirLugarRecurso").val();


    if(nombreRecurso != "" || descripcion != "" || lugar != ""){
       // Si todos los ampos estan rellenos, realizamos la solicitud ajax

        var parametros = {
            "nombre": nombreRecurso,
            "descripcion": descripcion,
            "lugar" : lugar,
        }

        $.ajax({
            data: parametros,
            url: '../assets/js/ajax/añadirRecurso.ajax.php',
            type: 'post',

            success: function (response) {
               // mostramos el nuevo recurso por pantalla


               
            },

    });

    }

    else{
        alert("Todos los campos son obligatorios");
    }

}
