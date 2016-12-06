
@extends('layouts.principal')
	@section('content')

	<!-- Titulo Nombre Cliente -->
	<div class="panel">
	  <div class="panel-body">
	    <i class="icon-user">&nbsp;&nbsp;<b>Cliente:</b> 
			@foreach($informacionClientes as $informacion)
				{{$informacion->nombre}}
			@endforeach
	     </i>
	  </div>
	</div>




	  <!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" id="tabActividad" class="active"><a href="#actividad" aria-controls="actividad" role="tab" data-toggle="tab">Actividades</a></li>
	    <li role="presentation"><a href="#informacion" aria-controls="informacion" role="tab" data-toggle="tab">Información</a></li>
		  <li role="presentation" id="tabContacto"><a href="#contacto" aria-controls="contacto" role="tab" data-toggle="tab">Contactos</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Historial</a></li>
	    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Ventas</a></li>
	    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Proyectos Activos</a></li>
	    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Proyectos Inactivos</a></li>
	    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Cotizaciones Enviadas</a></li>
	  </ul>

	<style type="text/css">
				 /* CSS used here will be applied after bootstrap.css */
				ul {
					width: 100%;
				    list-style: none;
				    padding: 0;
				    margin: 0;
				}
				.panel-al-placeholder {
					
				    margin-bottom: 18px;
				    border:1px solid #7076FC;
				    background:#E4E3E3;

				}
				.panel-heading{
					cursor:move;
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
					max-height: 200px;
					overflow-y: scroll;
				}
				

			</style>
	<script type="text/javascript">
				$(document).ready(function() {   

				   $('#sortable').sortable({
					    tolerance: 'pointer',
					    handle: '.panel-heading',
					    placeholder: 'col-xs-4 panel-al-placeholder',
					    start: function (e, ui) {
					        ui.placeholder.height(ui.item.children().height());
					    }
					});
				});
			</script>


	  <!-- Tab panes -->
	  <div class="tab-content">

		<!------------------------  CONTENIDO PESTAÑA INFORMACION   ------------------------------------>	
	    <div role="tabpanel" class="tab-pane" id="informacion">
	    	<br>


				<div class="panel panel-custom">
					<div class="panel-heading">
						<h3 class="panel-title"><label>Detalles Cliente</label></h3>
					</div>
				<div class="panel-body">


	    	<table border="0" style="margin: 10px; width: 100%">
	    		
	    		@foreach($informacionClientes as $informacion)

					<tr>
						<td align="right"><b>Razón Social:</b></td>
						<td colspan="4">&nbsp;&nbsp;{{$informacion->nombre}}</td>


					</tr>

	    		<tr>
	    			<td align="right"><b>Rut:</b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->rut}}</td>

	    			<td align="right"><b>Email</b></td>
	    			<td>&nbsp;&nbsp;<a href="mailto:{{$informacion->email}}">{{$informacion->email}}</a></td>
	    			<td rowspan="7" align="center"><img src="../clientes/{{$informacion->logo}}" width="200 px" height="200 px"></td>
	    			
	    		</tr>
	    		<tr>
	    			<td align="right"><b>Código: </b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->codigo}}</td>

	    			<td align="right"><b>Web</b></td>
	    			<td>&nbsp;&nbsp;<a href="{{$informacion->direccionWeb}}">{{$informacion->direccionWeb}}</a></td>
	    		</tr>
	    		<tr>
	    			<td align="right"><b>Sigla: </b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->sigla}}</td>

	    			<td align="right"><b>Fono: </b></td>
	    			<td>&nbsp;&nbsp;<a href="tel:{{$informacion->fono}}">{{$informacion->fono}}</a></td>
	    			
	    		</tr>
	    		<tr>
	    			<td align="right"><b>Ministerio: </b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->nombreMinisterio}}</td>

	    			<td align="right"><b>Skype: </b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->skype}}</td>
	    		</tr>
	    		<tr>
	    			<td align="right"><b>Región:</b> </td>
	    			<td>&nbsp;&nbsp;{{$informacion->region}}</td>

	    			<td align="right"><b>Tipo: </b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->tipoCliente}}</td>
	    		</tr>
	    		<tr>
	    			<td align="right"><b>Dirección: </b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->direccion}}</td>

	    			<td align="right"><b>Presupuesto: </b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->presupuesto}}</td>
	    		</tr>
	    		<tr>
	    			<td align="right">&nbsp;&nbsp;&nbsp;<b>Trabajadores:&nbsp;</b></td>
	    			<td>&nbsp;&nbsp;{{$informacion->numeroTrabajadores}}</td>

	    			<td align="right">&nbsp;&nbsp;&nbsp;<b>Comerciales:&nbsp;</b></td>
	    			<td></td>
	    		</tr>

	    		@endforeach
	    	</table>

					</div>
				</div>






		</div>
		<!-------------------------------------------------------------------------------------------->

		<!------------------------  CONTENIDO PESTAÑA ACTIVIDADES   ------------------------------------>
	    <div role="tabpanel" class="tab-pane active" id="actividad">
	    	<br>

	    	<button type="button" class="btn btn-default " data-toggle="modal" data-target="#agregarContactoModal">
			 <i class="icon-plus-sign icon-large"></i> Agregar Actividad
			</button>

			<button type="button" class="btn btn-default " onclick="Actualizar();" id="btnActualizar">
			 <i class="icon-refresh icon-large " id="iconoActualizar"></i> Actualizar
			</button>


			<button type="button" class="btn btn-default " onclick="window.location.href='/cliente'">
				<i class="icon-random icon-large" > Cambiar Cliente</i>
			</button>

			@include('cliente.creaActividadModal')

			<div id="mensajeCreadoActividad" class="alert alert-success alert-dismissible" role="alert" style="display:none">
		        <strong> Actividad Agregada Correctamente.</strong>
		    </div>


	    	<br><br>

					<ul id="sortable">

					    <li class="col-xs-6">
					        <div class="panel">
					            <div class="panel-heading ui-sortable-handle">
									<i class="icon-phone icon-large">&nbsp;&nbsp;<b>Llamadas</b></i>
								</div>
					            <div class="panel-body" id="panel-detalle-cliente">

					            	<table class="table table-striped table-bordered dt-responsive nowrap" id="tablaLlamadas" style="padding: 0">
										<thead>
											<th>Tipo </th>
											<th>Contacto </th>
											<th>Contenido</th>
											<th>Fecha </th>
											<th>JP </th>
											<th>Acción </th>				
										</thead>
										
										<tbody>

											<tr>
												<!--datos desde jquery-->

											</tr>
										</tbody>
										
									</table>

									<!--Cargando-->
									<div id="cargandoActividades" align="center">			        
					            		<i class="icon-spinner icon-spin icon-2x"></i>
					            	</div>
					            	<!--/Cargando-->
						
					            </div>
					        </div>
					    </li>

					    <li class="col-xs-6">
					        <div class="panel">
					            <div class="panel-heading ui-sortable-handle"><i class="icon-group icon-large">&nbsp;&nbsp;<b>Reuniones</b></i></div>
					            <div class="panel-body" id="panel-detalle-cliente">
					            	<table class="table table-bordered table-striped table-hover" id="tablaReuniones" style="padding: 0">
										<thead>
										<th>Tipo </th>
										<th>Contacto </th>
										<th>Contenido</th>
										<th>Fecha y hora Reunion</th>
										<th>JP </th>
										<th>Acción </th>
										</thead>
										<tbody>											

											<tr>
												<!--datos desde jquery-->

											</tr>
										</tbody>
										
									</table>

									<div id="cargandoActividades2" align="center">				          
					            		<i class="icon-spinner icon-spin icon-2x"></i>
					            	</div>
						
					            </div>
					        </div>
					    </li>




					    <li class="col-xs-6">
					        <div class="panel">
					            <div class="panel-heading ui-sortable-handle"><i class="icon-envelope icon-large">&nbsp;&nbsp;<b>Email Enviados</b></i></div>
					            <div class="panel-body" id="panel-detalle-cliente">
					            	
					            	<table class="table table-bordered table-striped table-hover " id="tablaEmails" style="padding: 0">
										<thead>
											<th>Tipo </th>
											<th>Contacto </th>
											<th>Contenido </th>
											<th>Fecha </th>
											<th>JP </th>
											<th>Acción </th>				
										</thead>
										
										<tbody>											

											<tr>
												<!--datos desde jquery-->

											</tr>
										</tbody>
									</table>

									<div id="cargandoActividades3" align="center">				          
					            		<i class="icon-spinner icon-spin icon-2x"></i>
					            	</div>
						
					            </div>
					        </div>
					    </li>

					    <li class="col-xs-6">
					        <div class="panel">
					            <div class="panel-heading ui-sortable-handle"><i class="icon-file-text-alt icon-large">&nbsp;&nbsp;<b>Cotizaciones Realizadas</b></i></div>
					            <div class="panel-body" id="panel-detalle-cliente">
					            	
					            	<table class="table table-bordered table-striped table-hover " id="tablaCotizaciones" style="padding: 0">
										<thead>
											<th>Tipo </th>
											<th>Contacto </th>
											<th>Contenido </th>
											<th>Fecha </th>
											<th>JP </th>
											<th>Presupuesto </th>
											<th>Acción </th>				
										</thead>
										
										<tbody>											

											<tr>
												<!--datos desde jquery-->

											</tr>
										</tbody>
									</table>

									<div id="cargandoActividades4" align="center">				          
					            		<i class="icon-spinner icon-spin icon-2x"></i>
					            	</div>
						
					            </div>
					        </div>
					    </li>
					 
					</ul>

	    </div>
	    <!------------------------------------------------------------------------------------------>
	    

	    
		<!-------------------------------------  CONTENIDO PESTAÑA CONTACTOS   -------------------------->
	    <div role="tabpanel" class="tab-pane" id="contacto">
			<br>

	    	<button type="button" class="btn btn-default " data-toggle="modal" data-target="#agregarContacto">
				<i class="icon-plus-sign icon-large"></i> Agregar Contactos
			</button>

			&nbsp;&nbsp;&nbsp;&nbsp;

			<a href="cargo/create" class="btn btn-primary" hr><i class="icon-plus icon-large"></i> Agregar Cargos</a>

			<div id="mensajeCreadoContacto" class="alert alert-success alert-dismissible" role="alert" style="display:none">
		        <strong> Contacto Agregado Correctamente.</strong>
		    </div>



			<div style="float: right">
				<input type="text" id="searchbox" class="form-control" style="width: 100%" placeholder="Buscar...">
			</div>
			<h5 style="float: right"><i class="icon-search"></i> Buscar Contacto: &nbsp;&nbsp;</h5>
			<br><br>

			@include('cliente.creaContactoModal')
			<div class="panel panel-custom">
				<div class="panel-heading">
					<h3 class="panel-title"><label>Contactos</label></h3>
				</div>
				<div class="panel-body">

<div class="table-responsive" style="width: 100%">
				<table class="table table-striped table-bordered dt-responsive nowrap" id="tablaContactos2" cellspacing="0">
				<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido </th>
					<th>Cliente</th>
					<th>Cargo </th>
					<th>Email</th>
					<th>EmailSecretaria</th>
					<th>Fono</th>
					<th>Movil</th>
					<th>Area</th>
					<th>Region</th>
					<th>DireccionPostal</th>
					<th>Skype</th>
					<th>Cumpleaños</th>
					<th>Hobbies</th>
					<th>Facebook</th>
					<th>Linkedin</th>
					<th>Estado</th>
					<th>Acción</th>
				</tr>
				</thead>

				<tbody>
				@foreach($contactos as $contacto)

					<tr>
						<td>{{$contacto->nombre}}</td>
						<td>{{$contacto->apellido}}</td>
						<td>{{$contacto->cliente}}</td>
						<td>{{$contacto->cargo}}</td>
						<td>{{$contacto->email}}</td>
						<td>{{$contacto->email_secretaria}}</td>
						<td>{{$contacto->fono}}</td>
						<td>{{$contacto->movil}}</td>
						<td>{{$contacto->area}}</td>
						<td>{{$contacto->region}}</td>
						<td>{{$contacto->direccionPostal}}</td>
						<td>{{$contacto->skype}}</td>
						<td>{{$contacto->cumpleaños}}</td>
						<td>{{$contacto->hobbies}}</td>
						<td><a href="https://{{$contacto->facebook}}">{{$contacto->facebook}}</a></td>
						<td><a href="https://{{$contacto->linkedin}}">{{$contacto->linkedin}}</a></td>
						<td>{{$contacto->estado}}</td>
						<td align="center">

							<a href="../contacto/{{$contacto->id}}/edit">
							<span class="glyphicon glyphicon-edit" aria-hidden="true" style="color:#7397FE"></span>
							</a>
						</td>
					</tr>


				@endforeach
				</tbody>
			</table>
	
	</div>

				</div>
			</div>
			<style>
				.dataTables_filter {
					display: none;
				}
			</style>

			<script>

				$(document).ready(function() {
					$('#tablaContactos2').DataTable({

						"scrollCollapse": true,
						"paging":         false,
						"info":     false,

						"dom": '<"top"i>rt<"bottom"flp><"clear">'
					});

					var dataTable = $('#tablaContactos2').dataTable();
					$("#searchbox").keyup(function() {
						dataTable.fnFilter(this.value);
					});

					//new $.fn.dataTable.FixedHeader( table );
				} );
			</script>





		<!---------------------------------------------------------------------------------------------------------------------------->


		  <div role="tabpanel" class="tab-pane" id="sdf">

		  </div>

		</div>


<br>







	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("clientes");
		tabButton.className = "active";



	</script>

	@endsection


	@section('scripts')
		{!!Html::script('js/actividad.js')!!}
		{!!Html::script('js/contactoDetalle.js')!!}
	@endsection