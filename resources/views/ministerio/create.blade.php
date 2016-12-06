@extends('layouts.principal')

	@section('content')

		{!!Form::open(['route'=>'ministerio.store','method'=>'POST', 'id' => 'myForm'])!!}

		
		<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    		<strong> Ministerio Agregado Correctamente.</strong>
		</div>


			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			@include('ministerio.form.ministerio')
			{!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
		{!!Form::close()!!}


	@endsection

	@section('scripts')
		{!!Html::script('js/ministerio.js')!!}
	@endsection