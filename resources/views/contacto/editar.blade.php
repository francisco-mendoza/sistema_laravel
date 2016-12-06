<!-- Extensión de vista principal o maestra -->
@extends('layouts.principal')

    <!-- sección para editar -->
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

			#panel-detalle-contacto{
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



			#confirmationWindow {
				z-index: 100;
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				background-color: rgba(0,0,0,0.6);
				text-align: center;
				cursor: default;
			}

			#confirmationWindow .wrapper1 {
				position: absolute;
				left: 50%;
				top: 50%;
				width: 200px;
				height: 100px;
			}

			#confirmationWindow .wrapper2 {
				position: absolute;
				left: -50%;
				top: -50%;
				height: 80%;
				width: 90%;
				padding: 10% 5%;
				background-color: #fff;
				border-radius: 3px;
				box-shadow: 0 0 5px rgba(0,0,0,0.8);
			}

			#confirmationWindow p {
				margin: 0 0 1em;
			}

			#confirmationWindow button {
				cursor: pointer;
			}

			#content {
				margin: 1em 20%;
				border: 1px solid #999;
				min-height: 100px;
			}


		</style>

		<div class="panel panel-default">
			<div class="panel-heading">
				<b><i class="icon-bar-chart icon-large"></i>&nbsp;&nbsp;<a href="/contacto">Contacto</a> > Editar</b>
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
				<i class="icon-edit icon-large">&nbsp;&nbsp;<b>Editar Contacto</b></i>
			</div>
			<div class="panel-body" id="panel-detalle-contacto">

				{!!Form::model($contacto,['route'=>['contacto.update',$contacto->id],'method'=>'PUT','files'=>true])!!}
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
					{!!Form::select('idCargo',(['0' => 'Selecciona Cargo'] + $cargos),null,['class' => 'form-control']) !!}
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
				<br>
				<div  class="form-group col-xs-6" style="text-align: center">


					<button class="btn btn-success" onclick="submit"><i class="icon-save icon-large"></i> Guardar Cambios</button>
				</div>
				{!!Form::close()!!}

				{!!Form::open(['route'=>['contacto.destroy',$contacto->id],'method'=>'DELETE','files'=>true,'id'=>'formDelete'])!!}


				<div  class="form-group col-xs-6" style="text-align: center">


					<input type=button id="eliminarContacto" value="Eliminar Contacto" class="btn btn-danger icon-remove">


					<script>


						$(document).ready( function() {


							$("#eliminarContacto").click( function() {
								jConfirm('Seguro deseas eliminar a este Contacto?', 'Confirmar', function(r) {
									//jAlert('Confirmed: ' + r, 'Confirmation Results');
									if(r==true){
										$("#formDelete").submit();
									}
								});
							});


						});
					</script>
				</div>


				{!!Form::close()!!}

			</div>
		</div>

		<script type="text/javascript">
			//ponemos la clase active para que se pinte el menú
			var tabButton = document.getElementById("contactos");
			tabButton.className = "active";
		</script>






        
	@endsection