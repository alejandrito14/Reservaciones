

var url = '../Controller/actividadController.php';

$(document).ready(function () {

    cargarTabla();

});



function cargarTabla() {
    $("#tablaActividad tbody").html("");

    $.getJSON(url + "/actividades", function (vresponse) {
        // console.log(cabanias);
        // 
        // alert(vresponse.cabanias.cabanias.length);


        $.each(vresponse.actividades.actividades, function (i, actividades) {
            // console.log(cabanias);
            
       var datos =actividades.idActividad + "*" + actividades.nombreActividad + "*" + actividades.tarifa+ "*" + actividades.detalle;

            var actividades = "<tr>"

                    + "<td>" + actividades.idActividad + "</td>"
                    + "<td>" + actividades.nombreActividad + "</td>"
                    + "<td> $ " + actividades.tarifa + "</td>"
                    + "<td> " + actividades.detalle + "</td>"
                    + "<td><button type='button 'class='btn btn-danger btn-sm'  onclick='eliminar(" + '"' + actividades.idActividad + '"' + ")' >Eliminar</button> <buton type='button ' class='btn btn-info btn-sm' data-toggle='modal' data-target='#EditarA' onclick='mostrar(" + '"' + datos + '"' + ");' >Editar</button> </td>"
                    + "</tr>";

            $(actividades).appendTo("#tablaActividad tbody");

        });

    });

}

function eliminar(id) {

    var pregunta = confirm('¿Esta seguro de eliminar este registro?');
    if (pregunta == true) {
        $.ajax({
            type: 'DELETE',
            url: url + "/actividades/" + id,
            success: function (vresponse) {
                alert(' deleted successfully');

                cargarTabla();
            },
            error: function (verror) {
                alert('delete error');
            }

        });
        return false;
    } else {
        return false;
    }


}