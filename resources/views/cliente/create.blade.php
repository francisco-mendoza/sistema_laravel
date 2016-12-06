@extends('layouts.principal')

@section('content')
	<style type="text/css">
		ul{
			width: 100%;
			list-style: none;
			/*padding: 0;*/
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

		#panel-detalle-cliente{
			/*padding: 0px;*/
			max-height: 720px;
			overflow-y: scroll;
		}

		.form-group {


			float: left;
			padding-right: 10px;
		}
		.form-horizontal .form-group {
			margin-right: 0px;
			margin-left: 0px;
		}
		#btnAgregaCliente{
			width: 30%;


		}


	</style>

	<div class="panel panel-default">
		<div class="panel-heading">
			<b><i class="icon-bar-chart icon-large"></i>&nbsp;&nbsp;<a href="/cliente">Clientes</a> > Nuevo</b>
		</div>
	</div>

	@if(count($errors) > 0)
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<ul>
				@foreach($errors->all() as $error)
					<li>{!!$error!!}</li>
				@endforeach
			</ul>
		</div>
	@endif



	<div class="panel">
		<div class="panel-heading ui-sortable-handle" style="cursor:move;">
			<i class="icon-suitcase icon-large">&nbsp;&nbsp;<b>Nuevo Cliente</b></i>
		</div>
		<div class="panel-body" id="panel-detalle-cliente">

	{!!Form::open(['route'=>'cliente.store','method'=>'POST','files'=>true])!!}


			<div class="form-group col-sm-4">
				{!!Form::label('* Ministerio:')!!}
				{!! Form::select('idMinisterio',(['' => 'Selecciona un Ministerio'] + $ministerios),null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('* Razón Social:')!!}
				{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
			</div>

			<div class="form-group col-sm-4">
				<script>
					$(document).ready(function() {
						$('#rut').Rut({
							on_error: function(){
								$('#errorRut').show();
								$("#rut").css("border","1px solid #FF3D3D");
								$("#rut").css("background-color","#FFF");
							},
							on_success: function(){
								$('#errorRut').hide();
								$("#rut").css("border","1px solid #218818");
								//$("#rut").css("background-color","#D3FFD8");
							},
							format_on: 'keyup'
						});
					});

				</script>
				{!!Form::label('* Rut:')!!}
				{!!Form::text('rut',null,['class'=>'form-control required rut','id'=>'rut','placeholder'=>'Rut'])!!}
				<div id="errorRut" style="color: #c9302c;display: none">Rut incorrecto</div>
			</div>


			<div class="form-group col-sm-4">
				{!!Form::label('Codigo:')!!}
				{!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('Sigla:')!!}
				{!!Form::text('sigla',null,['class'=>'form-control','placeholder'=>'Sigla'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('* Region:')!!}
				{!! Form::select('idRegion',(['' => 'Selecciona Region'] + $regions),null,['class' => 'form-control']) !!}
			</div>


			<div class="form-group col-sm-4">
				{!!Form::label('Dirección:')!!}
				{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('N° Trabajadores:')!!}
				{!!Form::text('numeroTrabajadores',null,['class'=>'form-control','placeholder'=>'Trabajadores'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('* Email:')!!}

				{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])!!}
			</div>

			<div class="form-group col-sm-4">
				<script>
					$(function() {
						$("#url").click(function() {
							$("#url").val("http://");
						});
					})
				</script>
				{!!Form::label('direccionWeb:')!!}
				{!!Form::text('direccionWeb',null,['class'=>'form-control','id'=>'url','placeholder'=>'direccionWeb'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('* Fono:')!!}
				{!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Fono'])!!}
			</div>
			<div class="form-group col-sm-4">
				{!!Form::label('Fono Contacto:')!!}
				{!!Form::text('fonoContacto',null,['class'=>'form-control','placeholder'=>'Fono Contacto'])!!}
			</div>
			<div class="form-group col-sm-4">
				{!!Form::label('Fono Jefe Directo:')!!}
				{!!Form::text('fonoJefeDirecto',null,['class'=>'form-control','placeholder'=>'Fono Jefe Directo'])!!}
			</div>
			<div class="form-group col-sm-4">
				{!!Form::label('Fono Secretaria:')!!}
				{!!Form::text('fonoSecretaria',null,['class'=>'form-control','placeholder'=>'Fono Secretaria'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('Skype:')!!}
				{!!Form::text('skype',null,['class'=>'form-control','placeholder'=>'skype'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('* Sector:')!!}
				{!! Form::select('idTipoCliente',(['0' => 'Seleccione Sector Cliente'] + $tipoClientes),null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-sm-4">
				<script>
					$(function() {
						$("#presupuesto").maskMoney({prefix:'$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false,precision: 0});
					})
				</script>
				{!!Form::label('Presupuesto:')!!}
				{!!Form::text('presupuesto',null,['class'=>'form-control','id'=>'presupuesto','placeholder'=>'presupuesto'])!!}
			</div>

			<div class="form-group col-sm-4">
				{!!Form::label('Logo:')!!}
				<input type="file" name="logo" id="logo" class="form-control">
			</div>

			<p>* Obligatorio</p>

			<div  class="form-group col-sm-9" style="text-align: center">
				<br>
				{!!Form::submit('Agregar Cliente',['class'=>'btn btn-success icon-save ','id'=>'btnAgregaCliente'])!!}
			</div>



	{!!Form::close()!!}

	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("clientes");
		tabButton.className = "active";
	</script>

	</div>
	</div>

@stop