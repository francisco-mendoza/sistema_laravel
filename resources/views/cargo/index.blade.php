
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
	$(document).ready(function() 
			{
	    		$('#tablaContactos').DataTable();
			} 
			);
</script>

<a href="cargo/create" class="btn btn-primary" hr style="float: right">Nuevo Cargo</a><br><br>



	<div class="panel panel-default">


	  <div class="panel-heading">Cargos</div>
	  <div class="panel-body" style="max-width: 10;overflow-y: scroll;">	


		<table class="table table-bordered table-striped table-hover dataTable" id="tablaContactos">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripcion </th>
				
				</tr>
			</thead>
			
			<tbody>
			@foreach($cargos as $cargo)
			
				<tr>
					<td>{{$cargo->nombre}}</td>
					<td>{{$cargo->descripcion}}</td>
				
				</tr>

			
			@endforeach
			</tbody>
		</table>
		</div>
	</div>	

	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("contactos");
		tabButton.className = "active";
	</script>



@stop