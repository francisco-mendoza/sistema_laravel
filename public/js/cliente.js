$(document).ready(function(){
	//Cargar();
});




function Cargar() //cargadar datos en el grid
{
	var tablaDatos = $("#tablaClientes");
	var route = "/cliente";

	$.get(route, function(res){
		$(res).each(function(key,value){
			tablaDatos.append("<tr><td>"+value.nombreMinisterio+"</td><td>"+value.nombre+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
			
			$("#cargando").fadeOut(50);
		});
	});
}