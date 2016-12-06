@extends('layouts.principal')

<?php $message=Session::get('message') ?>



@section('content')

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Usuario Creado.
</div>
@endif

	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Apellido </th>
			<th>UserName</th>
			<th>Password </th>
			<th>Tipo Usuario</th>
		</thead>
		
		@foreach($usuarios as $usuario)
		<tbody>
			<td>{{$usuario->nombreUsuario}}</td>
			<td>{{$usuario->apellidoUsuario}}</td>
			<td>{{$usuario->username}}</td>
			<td>{{$usuario->password}}</td>
			<td>{{$usuario->tipoUsuario}}</td>
		</tbody>
		@endforeach
	</table>


@stop