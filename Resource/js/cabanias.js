

var url = '../Controller/cabaniaController.php';

$(document).ready(function () {

    $("#cabanias").html("");

   $.getJSON(url + "/cabanias", function (vresponse) {
          
      
        
        $.each(vresponse.cabanias.cabanias, function (i, cabanias) {

            var cabanas = 
                    "<div class='col-md-4'>"+
                    "<div class='image view view-first'>"+
            "<img style='width: 100%;  'class='img-thumbnail' src='../Resource/img/miimagen.jpg 'alt='image'/>" +
                    " </div>" +
                    "<div class='caption'>" +
                    "<h4>Detalles</h4>"+
                    " <p> Nombre: " + cabanias.nombre + "</p>" +
                    " <p>Costo: $ " + cabanias.tarifa + "</p>" +
                    " <p> Descripción: " + cabanias.descripcion + "</p>" +
                    "<p>"+
                     "<input name='cabanias' type='radio' value='"+ cabanias.idcabania+"' />"+
                     " <label >"+cabanias.nombre+"</label>"+
                     "</p>"+

                    " </div>" +
                 


                    "</div>   ";

            $(cabanas).appendTo("#cabanias");

        });

    });

});
