/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var url = '../Controller/turistaController.php';
$(document).ready(function () {
   $("#btningreso").attr("onclick", "ingreso()");

//    $("#formingreso").validate({
//        rules:
//                {
//                    txtcontrasena: {
//                        required: true,
//                    },
//                    txtemail: {
//                        required: true,
//                        email: true
//                    },
//                },
//        messages:
//                {
//                    txtcontrasena: {
//                        required: "please enter your password"
//                    },
//                    txtemail: "please enter your email address",
//                },
//        submitHandler: ingreso
    });

    function ingreso()
    {
        var datosform = $("#formingreso").serializeObject();
//        var correo =$("#txtemail").val();
//        var contra=$("#txtcontrasena").val();
        
        
//            if($("#txtemail").val()==""||$("#txtcontrasena").val()=="")
//            $("#errorMessage").html("por favor, ingrese credenciales");
//            $("#errorMessage").hide();

        $.ajax({
            type: 'GET',
            url: url + "/login",
            dataType: "JSON",
            data: JSON.stringify(datosform),
            beforeSend: function ()
            {

                $("#btningreso").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; entrando ...');
            },
            success: function (vresponse) {

                if (vresponse.messageNumber == '1') {

                    location.href = '../View/turista.php';
                  
               }

            },
            error: function (verror) {

            }

        });

    }









