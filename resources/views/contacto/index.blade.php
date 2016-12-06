
@extends('layouts.principal')




<?php $message=Session::get('message') ?>



@section('content')

	@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{Session::get('message')}}
		</div>
	@endif



<style>
	table.fixedHeader-floating{position:fixed !important;background-color:white}table.fixedHeader-floating.no-footer{border-bottom-width:0}table.fixedHeader-locked{position:absolute !important;background-color:white}@media print{table.fixedHeader-floating{display:none}}

	.panel-heading{

		border-radius: 0px;
		border-color: #B7B7B7;
		background-color: #D7D7D7;
	}
	.panel{
		border-radius: 0px;
		border-color: #B7B7B7;
	}

</style>

<script>
	$(document).ready(function()
			{
				$('#tablaContactos').DataTable();

			}
	);
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<b><i class="icon-bar-chart icon-large"></i>&nbsp;&nbsp;Contactos</b>
	</div>
</div>


<a href="cargo/create" class="btn btn-default" hr style="float: right"><i class="icon-certificate icon-large"></i> Agregar Cargos</a>
	<a href="cargo/" class="btn btn-default" hr style="float: right; padding-right: 5px"><i class="icon-plus-sign icon-large"></i> Ver Cargos</a>
	<div></div>
<a href="contacto/create" class="btn btn-default" hr style="float: left"><i class="icon-plus-sign icon-large"></i> Nuevo Contacto</a><br><br>
<br>

		<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tablaContactos">
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
						<a href="contacto/{{$contacto->id}}/edit"><span class="icon-edit icon-2x" aria-hidden="true" style="color:#7397FE">

					</span></a>


				</td>
				</tr>

			
			@endforeach
			</tbody>
		</table>


	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("contactos");
		tabButton.className = "active";
	</script>



@stop