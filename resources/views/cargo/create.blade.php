@extends('layouts.principal')

@section('content')

		<div style="">
			<button  type="button" class="btn btn-primary"  onclick="history.go(-1);">
				<i class="icon-chevron-sign-left icon-large">&nbsp;&nbsp;Atrás</i>
			</button>
		</div><br>

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

	
<div class="panel panel-default">


	  <div class="panel-heading">Nuevo Cargo</div>
	  <div class="panel-body" style="max-width: 10;overflow-y: scroll;">



	{!!Form::open(['route'=>'cargo.store','method'=>'POST'])!!}
		

		<div class="form-group">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('Descripción:')!!}
			{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción'])!!}
		</div>

		
		{!!Form::submit('Registrar',['class'=>'btn btn-primary '])!!}

	{!!Form::close()!!}


</div>
	</div>	




	<script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("contactos");
		tabButton.className = "active";
	</script>

   	
@stop