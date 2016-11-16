/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var url = '../Controller/turistaController.php';
$(document).ready(function () {
   // $("#btningreso").attr("onclick", "ingreso()");
  
   $("#formingreso").validate({
       
       rules:
   {
  txtcontrasena: {
   required: true,
   },
  txtemail: {
            required: true,
            email: true
            },
    },
       messages:
    {
           txtcontrasena:{
                      required: "please enter your password"
                     },
            txtemail: "please enter your email address",
       },
    submitHandler: ingreso
       });   
       
       function ingreso()
{
    var datosform = $("#formingreso").serializeObject();


    $.ajax({
        type: 'POST',
        url: url + "/login",
        dataType: "JSON",
        data: JSON.stringify(datosform),
         beforeSend: function()
   { 
   
    $("#btningreso").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
   },
               
               
               succes: function (vresponse) {
           alert(vresponse);
            if(vresponse==='ok'){
               
              
      location.href='../View/turista.php';
            }

        },
        error: function (verror) {

        }

    });

}

   

});






