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
				<b><i class="icon-bar-chart icon-large"></i>&nbsp;&nbsp;<a href="/cliente">Clientes</a> > Editar</b>
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
				<i class="icon-edit icon-large">&nbsp;&nbsp;<b>Editar Cliente</b></i>
			</div>
			<div class="panel-body" id="panel-detalle-cliente">

				{!!Form::model($cliente,['route'=>['cliente.update',$cliente->id],'method'=>'PUT','files'=>true])!!}
					@include('actividad.form.editForm')
				<br>
				<div  class="form-group col-xs-6" style="text-align: center">


					<button class="btn btn-success" onclick="submit"><i class="icon-save icon-large"></i> Guardar Cambios</button>
				</div>
				{!!Form::close()!!}

				{!!Form::open(['route'=>['cliente.destroy',$cliente->id],'method'=>'DELETE','files'=>true,'id'=>'formDelete'])!!}


				<div  class="form-group col-xs-6" style="text-align: center">


					<input type=button id="eliminarCliente" value="Eliminar Cliente" class="btn btn-danger icon-remove">


					<script>


						$(document).ready( function() {


							$("#eliminarCliente").click( function() {
								jConfirm('Seguro deseas eliminar a este Cliente?', 'Confirmar', function(r) {
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
			var tabButton = document.getElementById("clientes");
			tabButton.className = "active";
		</script>
        
	@endsection