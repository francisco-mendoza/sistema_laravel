@extends('layouts.principal')

	@section('content')
	
	@include('ministerio.modal')

	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
  		<strong> Ministerio Actualizado Correctamente.</strong>
	</div>
		
		<script>
			
		</script>

		

		<button class='btn btn-primary' data-toggle='modal' data-target='#createModal'>Crear Ministerio</button>

		<a href="Javascript:history.back();" class="btn btn-primary" hr style="float: left">Volver</a><br><br>

		<table class="table table-bordered table-striped table-hover dataTable" id="tablaMinisterios">
			<thead>
				<th>Nombre</th>
				<th>Operaciones</th>
			</thead>
	
			
			<tbody>
				

				<tr>
					<!--datos desde jquery-->

				</tr>
			</tbody>

		</table>

		<div id="cargando" style="width: 300px; margin: 0 auto;"><img src="/images/ajax-loader.gif" align="center" /></div>


		@include('ministerio.createModal')



	@endsection

	@section('scripts')
		{!!Html::script('js/ministerio.js')!!}
	@endsection