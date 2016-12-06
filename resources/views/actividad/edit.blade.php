
@extends('layouts.principal')

@section('content')
	<style type="text/css">
		ul{
			width: 100%;
			list-style: none;

			margin: 0;
		}
		.panel-heading{

			border-radius: 0px;
			border-color: #B7B7B7;
			background-color: #D7D7D7;
		}
		.panel{
			border-radius: 0px;
			border-color: #B7B7B7;
		}
		.btn-default{
			color: #000000;
			background-color: #D7D7D7;
			border-color: #B7B7B7;
		}
		#panel-detalle-cliente{

			max-height: 520px;

		}


	</style>

	<div style="">
		<button  type="button" class="btn btn-primary"  onclick="history.go(-1);">
			<i class="icon-chevron-sign-left icon-large">&nbsp;&nbsp; Atras </i>
		</button>
	</div><br>

	<div class="panel">
		<div class="panel-heading ui-sortable-handle" style="cursor:move;">
			<i class="icon-phone icon-large">&nbsp;&nbsp;<b>Editar Actividad</b></i>
		</div>
		<div class="panel-body" id="panel-detalle-cliente">

	{!!Form::model($actividad,['route'=>['actividad.update',$actividad->id],'method'=>'PUT'])!!}


			<div class="form-group">
				{!!Form::label('Tipo Actividad:')!!}
				{!!Form::select('idTipoActividad',(['' => 'Selecciona Tipo Actividad'] + $selTipoActividades),null,['class' => 'form-control','id'=>'tipoActividades']) !!}
			</div>
			<div class="form-group" id="fechaReunion" style="display: none; margin: 0 auto">
				<label>Fecha y Hora Reunión</label>

				<div id="datetimepicker2" class="input-append">
					<input data-format="MM/dd/yyyy HH:mm:ss PP" type="text" name="fechaHora" id="fechaHora" class="form-control add-on" style="width: 60%;float: left;" />
    <span class="add-on" style="cursor:pointer;" >&nbsp;
      <i data-time-icon="icon-time icon-2x" data-date-icon="icon-calendar icon-2x">
	  </i>
    </span>
				</div>

			</div>


			<script type="text/javascript">
				$(function() {
					$('#datetimepicker2').datetimepicker({
						language: 'en',
						pick12HourFormat: true
					});
					$("#fechaHora").click(function() {
						$('#datetimepicker2').datetimepicker({
							language: 'en',
							pick12HourFormat: true
						});
					});
				});
			</script>

			<div class="form-group col-xs-6" >
				{!!Form::label('Cliente:')!!}
				{!! Form::select('idCliente',(['' => 'Selecciona un Cliente'] + $selClientes),null,['class' => 'form-control','id'=>'idCliente']) !!}
			</div>

			<div class="form-group col-xs-6">
				{!!Form::label('Contacto:')!!}
				{!!Form::select('idContacto',(['' => 'Selecciona un Contacto'] + $selContactos),null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group" >
				<input class="form-control" name="usuario" type="hidden" value="{!!Auth::user()->id!!}">
			</div>



			<div class="form-group">
				{!!Form::label('Comentario:')!!}

				<textarea name="comentario" id="comentario" class="form-control" placeholder="Escribe tu comentario"></textarea>
			</div>

			<div class="form-group">

				<input class="form-control" name="jerarquia" type="hidden" value="<?php echo $jer;?>">
			</div>

			<?php  $fechaHora = \Carbon\Carbon::now();?>
			<input type="hidden" value="<?php echo $fechaHora->toDateTimeString(); ?>" name="fecha" id="fecha">




			<div class="form-group col-xs-6">
				{!!Form::label('Estado:')!!}
						<!--Cargando-->
				<div id="cargandoEstados" align="left" style="display: none;">&nbsp;&nbsp;
					<i class="icon-spinner icon-spin icon-2x"></i>
				</div>
				<!--/Cargando-->
				{!!Form::select('estado',['' => 'Selecciona Estado'] ,null,['class' => 'form-control','id'=>'estados']) !!}
			</div>

			<div class="form-group col-xs-6">
				{!!Form::label('Resultado:')!!}
				<div id="cargandoResultados" align="left" style="display: none;">&nbsp;&nbsp;
					<i class="icon-spinner icon-spin icon-2x"></i>
				</div>
				{!!Form::select('resultado',['11' => 'Selecciona el Resultado'] ,'null',['class' => 'form-control','id'=>'resultados']) !!}
			</div>

			<div class="form-group" style="display:none;" id="monto">
				{!!Form::label('Monto Cotización:')!!}
				<input class="form-control" name="monto"  type="text" >
			</div>

			<script type="text/javascript">
				//Llenar combobox estado
				$("#tipoActividades").change(function(event){
					$("#estados").fadeOut(10);
					$("#cargandoEstados").fadeIn(10);

					$.get("actividad/estados/"+event.target.value+"",function(response,state){
						//console.log(response);
						$("#estados").fadeIn(10);
						$("#estados").empty();
						for(i=0; i<response.length; i++)
						{
							$("#estados").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
						}
						$("#cargandoEstados").fadeOut(10);

						// Si es cotización mostrar input monto
						var optionEstado = document.getElementById("tipoActividades");
						if(optionEstado.selectedIndex == 4)
						{
							$("#monto").fadeIn(10);
						}
						else if(optionEstado.selectedIndex == 1)
						{
							$("#fechaReunion").fadeIn(10);
						}
						else
						{
							$("#monto").hide();
							$("#fechaReunion").hide();
						}

					});



				});


				$("#estados").change(function(event){

					$("#resultados").fadeOut(10);
					$("#cargandoResultados").fadeIn(10);

					$.get("actividad/resultados/"+event.target.value+"",function(response,state){
						//console.log(response);
						$("#resultados").fadeIn(10);
						$("#resultados").empty();
						$("#resultados").append("<option value=11>Seleccione</option>");
						for(i=0; i<response.length; i++)
						{

							$("#resultados").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
						}
						$("#cargandoResultados").fadeOut(10);
					});

				});



			</script>

		
		{!!Form::submit('Actualizar',['class'=>'btn btn-success '])!!}

	{!!Form::close()!!}


		</div>
	</div>


	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("actividades");
		tabButton.className = "active";
	</script>



@stop