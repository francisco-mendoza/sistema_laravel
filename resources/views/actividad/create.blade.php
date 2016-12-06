@extends('layouts.principal')

	@section('content')


		{!!Form::open(['route'=>'actividad.store','method'=>'POST', 'id' => 'myForm'])!!}
		<fieldset>
			
			<div class="form-group">
				{!!Form::label('Cliente:')!!}
				{!! Form::select('idCliente',(['0' => 'Selecciona un Cliente'] + $clientes),null,['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!!Form::label('Contacto:')!!}
				{!! Form::select('idContacto',(['0' => 'Selecciona un Contacto'] + $contactos),null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!!Form::label('Tipo Actividad:')!!}
				{!! Form::select('idTipoActividad',(['0' => 'Selecciona Tipo Actividad'] + $tipoActividades),null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!!Form::label('Comentario:')!!}
				{!!Form::text('comentario',null,['class'=>'form-control','placeholder'=>'Escribe tu comentario'])!!}
			</div>
		</fieldset>
		



	        
	        {!!Form::submit('Registrar',['class'=>'btn btn-primary '])!!}
			
	      
	        {!!Form::close()!!}


    @endsection
