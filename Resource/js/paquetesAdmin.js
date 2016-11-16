

var url2 = '../Controller/paqueteController.php';

$(document).ready(function () {
cargarTabla();
   

});


function cargarTabla(){
    
    
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
                    + "<td><button type='button 'class='btn btn-danger btn-sm' onclick='eliminar("+'"'+paquetes.idPaquete +'"'+")'   >Eliminar</button> <buton type='button ' class='btn btn-info btn-sm'   onclick='editar("+'"'+paquetes.idPaquete +'"'+")'>Editar</button> </td>"
                    + "</tr>";

            $(paquetes).appendTo("#tablaPaquetes tbody");

        });

    }); 
    
    
    
    
}

function eliminar(id){
   
      	var pregunta = confirm('¿Esta seguro de eliminar este registro?');
	if(pregunta==true){
		$.ajax({
		type:'DELETE',
		url:url2 + "/paquetes/"+ id,
		
		 success: function(vresponse){
            alert(' deleted successfully');
            
            cargarTabla();
        },
        error: function(verror){
            alert('delete error');
        }
		
	});
	return false;
	}else{
		return false;
	}
    
    
}


function ecitar(id){
    
    	$.ajax({
		type:'GET',
		url:url2 + "/paquetes/"+ id,
		
		 success: function(vresponse){
                     
                     
                     
         
            
           
        },
        error: function(verror){
            alert('delete error');
        }
		
        });  
    
    
}
