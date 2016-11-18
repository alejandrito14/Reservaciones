

var url = '../Controller/cabaniaController.php';

$(document).ready(function () {

   cargarCabanias();
});


function cargarCabanias(){
    
     $("#cabanias").html("");

   $.getJSON(url + "/cabanias", function (vresponse) {
          
      
        
        $.each(vresponse.cabanias.cabanias, function (i, cabanias) {
            var datos = cabanias.idcabania + "*" + cabanias.nombre + "*" + cabanias.descripcion + "*" + cabanias.tarifa;

            var cabanas = 
                    "<div class='col-md-4'>"+
                    "<div class='image view view-first'>"+
            "<img style='width: 100%;  'class='img-thumbnail' src='../Resource/img/miimagen.jpg 'alt='image'/>" +
                    " </div>" +
                    "<div class='caption'>" +
                    "<h4>Detalles</h4>"+
                    " <p> Nombre: " + cabanias.nombre + "</p>" +
                    " <p>Costo: $ " + cabanias.tarifa + "</p>" +
                  
                   "</br>"+
                   
                   "<p>"+
                    
                     
                     "</p>"+
                        "</br>"+
                        
                    " </div>" +
                 
                  " <p><buton type='button ' class='btn btn-info btn-sm' data-toggle='modal' data-target='#Detalles' onclick='mostrar(" + '"' + datos + '"' + ");' >Detalles</button></p>"+
                   "<input name='cabanias' type='radio' value='"+ cabanias.idcabania+"' />"+
                     " <label >"+cabanias.nombre+"</label>"+

                    "</div>   ";

            $(cabanas).appendTo("#cabanias");

        });

    });

    
}




function mostrar(datos) {

    var d = datos.split("*");
    $("#cabania").val(d[0]);
    $("#nombrec").val(d[1]);
    $("#descripcion").val(d[2]);
    $("#tarifa").val(d[3]);

}