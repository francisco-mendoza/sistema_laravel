@extends('layouts.principal')

<?php $message=Session::get('message') ?>
@section('content')

	@if(Session::has('message'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{Session::get('message')}}
	</div>
	@endif

	<script>
		/*$(document).ready(function()
				{ $('#tablaClientes').DataTable(); }
				);*/
	</script>

<style>
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
	#panel-detalle-cliente{
		padding: 0px;
		max-height: 100%;
		/*overflow-y: scroll;*/
	}
	#table-header{
		/*position: fixed;*/
	}
</style>
	<div class="panel panel-default">
		<div class="panel-heading">
			<b><i class="icon-bar-chart icon-large"></i>&nbsp;&nbsp;Clientes</b>
		</div>
	</div>

<a href="ministerio/" class="btn btn-default" id="btnMinisterio" hr style="float: left"> Ministerios</a>


<a href="cliente/create" class="btn btn-default" hr style="float: right">
	<i class="icon-plus-sign icon-large"></i> Nuevo Cliente
</a><br><br>

<script>
	$(document).ready(function() {
		$('#tablaClientes').DataTable();

		//new $.fn.dataTable.FixedHeader( table );
	} );
</script>



<div class="table-responsive">

		<table class="table table-striped table-bordered dt-responsive nowrap" id="tablaClientes" cellspacing="0" width="100%">
		<thead id="table-header">
			<th>Más</th>
			<th>Acción</th>
			<th>Razón Social</th>
			<th>Rut</th>
			<th>Corporación</th>
			<th>Código </th>
			<th>Sigla</th>
			<th>Region</th>
			<th>Dirección</th>
			<th>Trabajadores</th>
			<th>Email</th>
			<th>Web</th>
			<th>Fono</th>
			<th>Skype</th>
			<th>Tipo</th>
			<th>Presupuesto</th>
		</thead>
		

		<tbody>
		@foreach($clientes as $cliente)
			<script type="text/javascript">
				$('[data-toggle="linkCliente"]').tooltip();
			</script>
<tr>
				<td></td>
				<td align="center">
					<a data-toggle="linkCliente" title="Ver Detalle Cliente" href="cliente/detalle?cliente={{$cliente->id}}">
						<span class="icon-folder-close-alt icon-2x" aria-hidden="true" style="color:#149bdf" data-toggle="linkCliente" title="Ver Cliente"></span>
					</a>
					<a data-toggle="linkCliente" title="Editar Cliente" href="cliente/{{$cliente->id}}/edit">
						<span class="icon-edit icon-2x" aria-hidden="true" style="color: #c09853" data-toggle="linkCliente" title="Editar Cliente"></span>
					</a>

				</td>

				<td>{{$cliente->nombre}}</td>
				<td>{{$cliente->rut}}</td>
				<td>{{$cliente->nombreMinisterio}}</td>
				<td>{{$cliente->codigo}}</td>
				<td>{{$cliente->sigla}}</td>
				<td>{{$cliente->region}}</td>
				<td>{{$cliente->direccion}}</td>	
				<td>{{$cliente->numeroTrabajadores}}</td>
				<td>{{$cliente->email}}</td>
				<td>{{$cliente->direccionWeb}}</td>
				<td>{{$cliente->fono}}</td>
				<td>{{$cliente->skype}}</td>	
				<td>{{$cliente->tipoCliente}}</td>
				<td>$&nbsp;{{$cliente->presupuesto}}</td>

		@endforeach
</tr>
		</tbody>

		
	</table>

</div>


	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("clientes");
		tabButton.className = "active";
	</script>



@endsection
@section('scripts')
		{!!Html::script('js/cliente.js')!!}
@endsection