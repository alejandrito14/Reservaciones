

var url2 = '../Controller/paqueteController.php';

$(document).ready(function () {
    cargarTabla();

    $("#btnguardar").attr("onclick", "guardarP()");


});


function cargarTabla() {


    $("#tablaPaquetes tbody").html("");

    $.getJSON(url2 + "/paquetes", function (vresponse) {
        // console.log(cabanias);
        // 
        // alert(vresponse.cabanias.cabanias.length);
        $.each(vresponse.paquetes.paquetes, function (i, paquetes) {
            // console.log(cabanias);
            var datos = paquetes.idPaquete + "*" + paquetes.nombrePaquete + "*" + paquetes.tarifa + "*" + paquetes.detalle;


            var paquetes = "<tr>"

                    + "<td>" + paquetes.idPaquete + "</td>"
                    + "<td>" + paquetes.nombrePaquete + "</td>"
                    + "<td> $ " + paquetes.tarifa + "</td>"
                    + "<td> " + paquetes.detalle + "</td>"
                    + "<td><button type='button 'class='btn btn-danger btn-sm' onclick='eliminar(" + '"' + paquetes.idPaquete + '"' + ")'   >Eliminar</button> <buton type='button ' class='btn btn-info btn-sm'   onclick='editar(" + '"' + paquetes.idPaquete + '"' + ")'>Editar</button> </td>"
                    + "</tr>";

            $(paquetes).appendTo("#tablaPaquetes tbody");

        });

    });




}





function eliminar(id) {

    var pregunta = confirm('¿Esta seguro de eliminar este registro?');
    if (pregunta == true) {
        $.ajax({
            type: 'DELETE',
            url: url2 + "/paquetes/" + id,
            success: function (vresponse) {
                alert(' Se eiimino correctamente');

                cargarTabla();
            },
            error: function (verror) {
                alert('Error al eliminar');
            }

        });
        return false;
    } else {
        return false;
    }


}


function ecitar(id) {

    $.ajax({
        type: 'GET',
        url: url2 + "/paquetes/" + id,
        success: function (vresponse) {

        },
        error: function (verror) {
            alert('delete error');
        }

    });


}

function guardarP() {

    var datosformulario = $("#ingresarP").serializeObject();



    $.ajax({
        type: 'POST',
        url: url2 + "/paqueteActividad",
        dataType: "JSON",
        data: JSON.stringify(datosformulario),
        success: function (vresponse) {

            if (vresponse.messageNumber == '1') {
                alert(' Se agrego paquete correctamente ');



            }
        },
        error: function (verror) {
            alert(' Error al agregar');

        }

    });

}

