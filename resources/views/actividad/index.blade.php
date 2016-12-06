@extends('layouts.principal')

<?php $message=Session::get('message') ?>

@section('content')

	<style type="text/css">
		ul{
			width: 100%;
			list-style: none;
			padding: 0;
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
			padding: 0px;
			max-height: 420px;
			overflow-y: scroll;
		}


	</style>

	<script type="text/javascript">
		$(document).ready(function() {

			$('.tree').treegrid({
				'initialState': 'collapsed',
				expanderExpandedClass: 'glyphicon glyphicon-menu-down',
				expanderCollapsedClass: 'glyphicon glyphicon-menu-right'


			});
		});
	</script>

	<div class="panel panel-default">
  		<div class="panel-heading">
			<b><i class="icon-bar-chart icon-large">&nbsp;&nbsp;ACTIVIDADES</i></b>
		</div>
	</div>

	<div class="alert alert-success alert-dismissible" role="alert" id="actividadCreada" style="display:none;">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  Actividad Creada.
	</div>



	@include('actividad.creaAccion')

			<button type="button" class="btn btn-default " data-toggle="modal" data-target="#agregaAccion">
			 	<i class="icon-plus-sign icon-large"></i> Agregar Actividad
			</button>

			<button type="button" class="btn btn-default " id="btnActualiza" onclick="">
			 <i class="icon-refresh icon-large"> Actualizar</i>
			</button>

	<script>
		$(document).ready(function(){
			$('#btnActualiza').click(function(){

				$("#carga").show();
				location.reload();

			});
		});
	</script>


	@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{Session::get('message')}}

		</div>
	@endif



	<script>
		$(document).ready(function(){

			window.onload=cerrar;
			function cerrar(){
				$("#carga").fadeOut(200);
				//$("#carga").animate({"opacity":"0"},200,function(){$("#carga").css("display","none");});
			}
			$("#carga").click(function(){cerrar();});

		});</script>

	<div title="Click para Cerrar" id="carga" style="cursor:pointer;
	border-radius:10px;
	-moz-border-radius:10px;
	-webkit-border-radius:10px);
	background-position:center;
	background-size:100%;
	width:300px;
	color:#fff;text-align:center;height:100px;padding:52px 12px 12px 12px;position:fixed;top:30%;left:40%;z-index:6;color:#222222;">
		<i class="icon-spinner icon-spin icon-4x"></i>
	</div>
	<!--cargando-->





	<script>
		$('#tablaLlamadas2').filterable();
	</script>
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-36251023-1']);
		_gaq.push(['_setDomainName', 'jqueryscript.net']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>



	<script>
		$(document).ready(function () {

			(function ($) {

				$('#filter').keyup(function () {

					var rex = new RegExp($(this).val(), 'i');
					$('.searchable tr').hide();
					$('.searchable tr').filter(function () {
						return rex.test($(this).text());
					}).show();

					//$("tr").css("class","treegrid-collapsed");

				})

			}(jQuery));



		});
	</script>

	<script>
		$(document).ready(function() {
		$("#panel-detalle-cliente").animate({ scrollTop: $('#panel-detalle-cliente')[0].scrollHeight}, 1000);
		} );
	</script>


	<style>


	</style>



	<br><br>

	    		<div id="TablaActividades">

					<input id="filter" type="text" class="form-control" placeholder="Filtrar..." style="width: 20%"><br>

					        <div class="panel">
					            <div class="panel-heading ">
									<i class="icon-list-ul icon-large">&nbsp;&nbsp;<b>Listado de Todas las Actividades</b></i>



								</div>
								<div class="panel-body" id="panel-detalle-cliente">

					            	<table class="table tree table-bordered table-striped table-condensed" id="tablaLlamadas2" style="padding: 0">

										<thead>
										<tr>
											<th>Tipo </th>
											<th>Contacto </th>
											<th>Cliente </th>
											<th>Contenido </th>
											<th>Fecha </th>
											<th>Fecha Reunión</th>
											<th>JP </th>
											<th>Acción </th>
										</tr>
										</thead>
										<tfoot>
											<th>Tipo </th>
											<th>Contacto </th>
											<th>Cliente </th>
											<th>Contenido </th>
											<th>Fecha </th>
											<th>Fecha Reunión</th>
											<th>JP </th>
											<th>Acción </th>
										</tfoot>
										<tbody class="searchable">
										@foreach($actividades as $actividad)

											@if($actividad->padre >0 )
											<tr class="treegrid-{{$actividad->id}} treegrid-parent-{{$actividad->padre}}" style="background-color:rgb(226, 226, 226);">
												<script>//$("td").css("background-color","grey");</script>
											@else
											<tr class="treegrid-{{$actividad->id}}">
											@endif

												<td class="col-md-2">&nbsp;<i class="{{$actividad->icono}} icon-large"></i>&nbsp;{{$actividad->tipo}}</td>
												<td class="col-md-1">{{$actividad->contacto}}</td>
												<td class="col-md-3">{{$actividad->cliente}}</td>
												<td class="col-md-2">{{$actividad->comentario}}</td>
												<td class="col-md-1">{{$actividad->fecha}}</td>
												<td class="col-md-1">{{$actividad->fechaReunion}}</td>
												<td class="col-md-2">{{$actividad->nombreUsuario}} {{$actividad->apellidoUsuario}}</td>
												<td class="col-md-1">
													<a href='../actividad/detalle?accion={{$actividad->id}}&cliente={{$actividad->idCliente}}&contacto={{$actividad->idContacto}}&padre=true'>
														<i class='icon-eye-open icon-large' style='color:#297DEF'></i>
													</a> &nbsp;
													<a href='actividad/{{$actividad->id}}/edit'>
														<i class='icon-edit icon-large' style='color: #204d74'></i>
													</a>&nbsp;

												</td>
											</tr>


											<script>
												var a = $("td").className;

											</script>





										@endforeach
										</tbody>

									</table>

									<!--<div id="cargandoActividades" align="center">
					            		<i class="icon-spinner icon-spin icon-2x"></i>
					            	</div>-->
						</div>

					        </div>

				</div>








	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("actividades");
		tabButton.className = "active";
	</script>

@endsection

	@section('scripts')
		{!!Html::script('js/actividadGeneral.js')!!}
	@endsection