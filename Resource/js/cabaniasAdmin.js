

var url = '../Controller/cabaniaController.php';

$(document).ready(function () {
cargarTabla();
   

});



function cargarTabla(){
     $("#tablaCabanias tbody").html("");

    $.getJSON(url + "/cabanias", function (vresponse) {
        // console.log(cabanias);
        // 
       // alert(vresponse.cabanias.cabanias.length);
        
        
        
        
        $.each(vresponse.cabanias.cabanias, function (i, cabanias) {
           // console.log(cabanias);
            var cabanas = "<tr>"

                    + "<td>" + cabanias.idcabania + "</td>"
                    + "<td>" + cabanias.nombre + "</td>"
                    + "<td>" + cabanias.descripcion + "</td>"
                    + "<td> $" + cabanias.tarifa + "</td>"
                    + "<td><button type='button 'class='btn btn-danger btn-sm' '  onclick='eliminar("+'"'+cabanias.idcabania+'"'+")'>Eliminar</button> <buton type='button ' class='btn btn-info btn-sm'>Editar</button> </td>"
                    + "</tr>";

            $(cabanas).appendTo("#tablaCabanias tbody");

        });

    });
    
    
}


function eliminar(id){
 
	var pregunta = confirm('¿Esta seguro de eliminar este registro?');
	if(pregunta==true){
		$.ajax({
		type:'DELETE',
		url:url + "/cabanias/"+ id,
		
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