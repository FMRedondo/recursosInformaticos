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