$(document).ready(function(){



	Cargar();

	Crear();
	Modificar();

	$('#tablaMinisterios').DataTable();


	
});



function Modificar()
{
	$("#actualizar").click(function(){
		var value = $("#id").val();
		var dato = $("#nombre").val();
		var route = "/ministerio/"+value+"";
		var token = $("#token").val();

		//var formId = '#myForm';

		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'PUT',
			dataType: 'json',
			data: {nombre: dato},

			success: function(){
				Actualizar();	
				$("#myModal").modal('toggle');
				$("#msj-success").fadeIn();
				$("#msj-success").fadeOut(1000);
				$("#cargando").fadeIn(50);
			}
		});
	});
}

function Actualizar()
{
	$("#tablaMinisterios tbody").empty();
	Cargar();	
	$("#createModal").modal('toggle');
}

function Cargar() //cargadar datos en el grid
{
	var tablaDatos = $("#tablaMinisterios");
	var route = "/ministerioss";

	$.get(route, function(res){
		$(res).each(function(key,value){
			tablaDatos.append("<tr><td>"+value.nombre+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
			$("#cargando").fadeOut(50);
		});
	});
}


function Mostrar(btn) //mostrar para editar
{
	//console.log(btn.value);
	var route = "/ministerio/"+btn.value+"/edit";

	$.get(route, function(res){
		$("#nombre").val(res.nombre);
		$("#id").val(res.id);
	});

	//alert(route);
}


function Crear()
{
	$('#registro').click(function(){
		var dato = $('#nombre').val();
		var route = "/ministerio";
		var token = $("#token").val();

		var formId = '#myForm';


		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			//data:{ministerio:dato},

			data:$(formId).serialize(),

			success:function(){

				Actualizar();
				$('#createModal').modal('toggle');
				
				
				
				$("#msj-success").fadeIn();
				$("#msj-success").fadeOut(1000);
				

				//$("#myForm")[0].reset();


			}

			
		});
	});
}
