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
			<b><i class="icon-book icon-large"></i>&nbsp;&nbsp;<a href="/contacto">Contactos</a> > Nuevo</b>
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




		<div style="">
			<button  type="button" class="btn btn-default"  onclick="history.go(-1);">
				<i class="icon-chevron-sign-left icon-large">&nbsp;&nbsp;Atrás</i>
			</button>
		</div><br>


	
<div class="panel">


	<div class="panel-heading ui-sortable-handle" style="cursor:move;">
		<i class="icon-user icon-large">&nbsp;&nbsp;<b>Nuevo Contacto</b></i>
	</div>
	  <div class="panel-body" style="max-width: 10;overflow-y: scroll;">



	{!!Form::open(['route'=>'contacto.store','method'=>'POST'])!!}
		

		
		
		<div class="form-group col-sm-4 ">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Apellido:')!!}
			{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Apellido'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Cliente:')!!}
			{!!Form::select('idCliente',(['0' => 'Selecciona Cliente'] + $clientes),null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Cargo:')!!}
			{!!Form::select('idCargo',(['' => 'Selecciona Cargo'] + $cargos),null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Email:')!!}
			{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('EmailSecretaria:')!!}
			{!!Form::text('email_secretaria',null,['class'=>'form-control','placeholder'=>'EmailSecretaria'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Fono:')!!}
			{!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Fono'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Movil:')!!}
			{!!Form::text('movil',null,['class'=>'form-control','placeholder'=>'Movil'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Area:')!!}
			{!!Form::select('idArea',(['0' => 'Selecciona Area'] + $areas),null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Region:')!!}
			{!!Form::select('idRegion',(['0' => 'Selecciona Region'] + $regions),null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('DireccionPostal:')!!}
			{!!Form::text('direccionPostal',null,['class'=>'form-control','placeholder'=>'direccionPostal'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Skype:')!!}
			{!!Form::text('skype',null,['class'=>'form-control','placeholder'=>'Skype'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Cumpleaños:')!!}
			{!!Form::date('cumpleaños',null,['class'=>'form-control','placeholder'=>'Skype'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Hobbies:')!!}
			{!!Form::text('hobbies',null,['class'=>'form-control','placeholder'=>'Tus hobbies separados por coma'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Facebook:')!!}
			{!!Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Url de tu Facebook'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Linkedin:')!!}
			{!!Form::text('linkedin',null,['class'=>'form-control','placeholder'=>'Url de tu Linkedin'])!!}
		</div>


		<input type="hidden" name="idEstado" id="idEstado" value="1">

		  <div  class="form-group col-sm-9" style="text-align: center">
			  <br>
		{!!Form::submit('Registrar Nuevo Contacto',['class'=>'btn btn-success '])!!}
		  </div>

	{!!Form::close()!!}


</div>
	</div>	




	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("contactos");
		tabButton.className = "active";
	</script>

   	
@stop