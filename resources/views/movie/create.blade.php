@extends('layouts.principal')

@section('content')


	<h1>Crear movie</h1>
	{!!Form::open(['route'=>'movie.store', 'method'=>'POST'])!!}
	<div class="form-group">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('descripcion','Descripcion:')!!}
		{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa descripcion'])!!}
	</div>
	
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

@stop