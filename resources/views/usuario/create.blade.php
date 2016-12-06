@extends('layouts.principal')

@section('content')


	<h1>Crear usuario</h1>
	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
		<div class="form-group">
			{!!Form::label('nombreUsuario','nombreUsuario')!!}
			{!!Form::text('nombreUsuario',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('apellidoUsuario','apellidoUsuario')!!}
			{!!Form::text('apellidoUsuario',null,['class'=>'form-control','placeholder'=>'Ingresa Apellido'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('username','username:')!!}
			{!!Form::text('username',null,['class'=>'form-control','placeholder'=>'Ingresa user'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('password','password:')!!}
			{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa password'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Tipo Usuario:')!!}
			{!!Form::select('tipoUsuario',(['0' => 'Selecciona Tipo Usuario'] + $tipoUsuarios),null,['class' => 'form-control']) !!}
		</div>
		
			{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

@stop