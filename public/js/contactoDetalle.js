$(document).ready(function(){

	CrearContacto();
	 


	//alert("asd");
	//Modificar(); ss
	
});

function CrearContacto()
{
	$('#registroContacto').click(function(){
		var dato = $('#nombre').val();
		var route = "/contacto";
		var token = $("#token").val();

		var formId = '#formContacto';


		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			//data:{ministerio:dato},

			data:$(formId).serialize(), //pesco todos los datos del form

			success:function()
			{			
				$('#agregarContacto').modal('hide');
				//Actualizar();
				$("#mensajeCreadoContacto").fadeIn();
				$("#mensajeCreadoContacto").fadeOut(1000);

				location.reload();


			

				//$("#formContacto")[0].reset();
				//recargarPaginaDetalleActividades();
			},
			error:function(msj){
				//console.log(msj.responseJSON.comentario);
				var mensajeError = $("#mensajeErrorContacto");
				mensajeError.empty();
				mensajeError.fadeIn();

				var valores = msj.responseJSON;

				$.each(valores,function(key,value){
					console.log(value);
					mensajeError.append("<strong>"+value+"</strong><br>");
				});
			}
			
		});

	});
}

function Actualizar()
{
	$("#cargandoActividades").fadeIn(50);
	$("#cargandoActividades2").fadeIn(50);
	$("#cargandoActividades3").fadeIn(50);
	$("#cargandoActividades4").fadeIn(50);

	$("#tablaLlamadas tbody").empty();
	$("#tablaReuniones tbody").empty();
	$("#tablaEmails tbody").empty();
	$("#tablaCotizaciones tbody").empty();

	CargarLlamadas();	
	CargarReuniones();
	CargarEmails();
	CargarCotizaciones();
	
}