/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var url = '../Controller/turistaController.php';
$(document).ready(function () {
    $("#btningreso").attr("onclick", "ingreso()");

});



function ingreso()
{
    var datosform = $("#formingreso").serializeObject();


    $.ajax({
        type: 'POST',
        url: url + "/login",
        dataType: "JSON",
        data: JSON.stringify(datosform),
        succes: function (vresponse) {



        },
        error: function (verror) {

        }

    });

}


