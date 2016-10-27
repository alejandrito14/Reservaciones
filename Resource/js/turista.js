
var url='../Controller/turistaController.php';
$(document).ready(function(){
   $("#btnenviar").attr("onclick","registrar()");
    
});



function registrar()
 {
    var datosform=$("#formregistro").serializeObject();
  
    $.ajax({
       
         type:'POST',
          url:url+"/turistas",
          dataType:"JSON",
          data:JSON.stringify(datosform),
         succes:function(vresponse){
          

        
         },
        
        error:function(verror){
       
         }
    
    });

}



/* $.validator.setDefaults({
    errorClass: 'invalid',
    validClass: "valid",
    errorPlacement: function (error, element) {
        $(element)
            .closest("form")
            .find("label[for='" + element.attr("id") + "']")
            .attr('data-error', error.text());
    },
    submitHandler: function (form) {
        console.log('form ok');
    }
});

$("#formregistro").validate({
    rules: {
        dateField: {
            date: true
        }
        
    }
});*/
