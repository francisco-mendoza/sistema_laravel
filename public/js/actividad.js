

$(document).ready(function(){

	CargarLlamadas();
	CargarReuniones();
	CargarEmails();
	CargarCotizaciones();
	Crear();
	CrearHijo();

	$('#btnActualizar').click(function(){
		//$("#iconoActualizar").fadeOut(50);
		$("#iconoActualizar").addClass('icon-spin');
	});


	//alert("asd");
	//Modificar();
	
});


function Crear()
{
	$('#registroActividad').click(function(){
		var dato = $('#nombre').val();
		var route = "/actividad";
		var token = $("#token").val();

		var formId = '#myForm';


		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			//data:{ministerio:dato},

			data:$(formId).serialize(), //pesco todos los datos del form

			success:function()
			{			
				$('#agregarContactoModal').modal('hide');
				Actualizar();
				$("#mensajeCreadoActividad").fadeIn();
				$("#mensajeCreadoActividad").fadeOut(1000);

				$("#myForm")[0].reset();
				recargarPaginaDetalleActividades();
			},
			error:function(msj){
				//console.log(msj.responseJSON.comentario);
				var mensajeError = $("#mensajeErrorActividad");
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

function CargarLlamadas() //cargadar datos en el grid
{
	var tablaDatos = $("#tablaLlamadas");
	var route = "/llamadasList";

	$.get(route, function(res){
		$(res).each(function(key,value){

			tablaDatos.append(
				 "<tr>"
				+"<td><i class='"+value.icono+"'></i></td>"
				+"<td>"+value.contacto+"</td>"
				+"<td>"+value.comentario+"</td>"
				 +"<td>"+value.fecha+"</td>"
				 +"<td>"+value.nombreUsuario+" "+value.apellidoUsuario+"</td>"
				+"<td><a href='../actividad/detalle?accion="+value.idActividad+"&cliente="+value.idCliente+"&contacto="+value.idContacto+"&padre=true'><i class='icon-eye-open icon-large' style='color:#297DEF'></i></a> &nbsp;&nbsp;"
				+"</td>"
				+"</tr>"
			);

			$("#cargandoActividades").fadeOut(50);



		});
	});
}


function CargarReuniones() //cargadar datos en el grid
{
	var tablaDatos = $("#tablaReuniones");
	var route = "/reunionesList";

	$.get(route, function(res){
		$(res).each(function(key,value){

			tablaDatos.append(
				 "<tr>"
				+"<td><i class='"+value.icono+"'></i></td>"
				+"<td>"+value.contacto+"</td>"
				+"<td>"+value.comentario+"</td>"
				 +"<td>"+value.fechaReunion+"</td>"
				 +"<td>"+value.nombreUsuario+" "+value.apellidoUsuario+"</td>"
				+"<td><a href='../actividad/detalle?accion="+value.idActividad+"&cliente="+value.idCliente+"&contacto="+value.idContacto+"&padre=true'><i class='icon-eye-open icon-large' style='color:#297DEF'></i></a> &nbsp;&nbsp;"
				+"</td>"
				+"</tr>"
			);

			$("#cargandoActividades2").fadeOut(50);
		});
	});
}

function CargarEmails() //cargadar datos en el grid
{
	var tablaDatos = $("#tablaEmails");
	var route = "/emailsList";

	$.get(route, function(res){
		$(res).each(function(key,value){

			tablaDatos.append(
				 "<tr>"
				+"<td><i class='"+value.icono+"'></i></td>"
				+"<td>"+value.contacto+"</td>"
				+"<td>"+value.comentario+"</td>"
				 +"<td>"+value.fecha+"</td>"
				 +"<td>"+value.nombreUsuario+" "+value.apellidoUsuario+"</td>"
				+"<td><a href='../actividad/detalle?accion="+value.idActividad+"&cliente="+value.idCliente+"&contacto="+value.idContacto+"&padre=true'><i class='icon-eye-open icon-large' style='color:#297DEF'></i></a> &nbsp;&nbsp;"
				+"</td>"
				+"</tr>"
			);

			$("#cargandoActividades3").fadeOut(50);
		});
	});
}

function CargarCotizaciones() //cargadar datos en el grid
{
	var tablaDatos = $("#tablaCotizaciones");
	var route = "/cotizacionesList";

	$.get(route, function(res){
		$(res).each(function(key,value){

			tablaDatos.append(
				 "<tr>"
				+"<td><i class='"+value.icono+"'></i></td>"
				+"<td>"+value.contacto+"</td>"
				+"<td>"+value.comentario+"</td>"
				 +"<td>"+value.fecha+"</td>"
				 +"<td>"+value.nombreUsuario+" "+value.apellidoUsuario+"</td>"
				 +"<td>$ "+value.presupuesto+"</td>"
				+"<td><a href='../actividad/detalle?accion="+value.idActividad+"&cliente="+value.idCliente+"&contacto="+value.idContacto+"&padre=true'><i class='icon-eye-open icon-large' style='color:#297DEF'></i></a> &nbsp;&nbsp;"
				+"</td>"
				+"</tr>"
			);

			$("#cargandoActividades4").fadeOut(50);

			$("#iconoActualizar").removeClass('icon-spin');
		});
	});
}

function CrearHijo()
{
	$(document).ready(function(){

		$('#agregarAccionHijo').click(function(){
			var dato = $('#nombre').val();
			var route = "/actividad";
			var token = $("#token").val();

			var formId = '#myForm';


			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'json',
				//data:{ministerio:dato},

				data:$(formId).serialize(), //pesco todos los datos del form

				success:function()
				{			
					$('#agregarAccionHijo').modal('hide');
					//Actualizar();
					$("#mensajeCreadoActividad").fadeIn();
					$("#mensajeCreadoActividad").fadeOut(1000);

					$("#myForm")[0].reset();
				}
				
			});

		});

	});
}





