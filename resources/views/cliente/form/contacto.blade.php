		<div class="form-group col-sm-4">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Apellido:')!!}
			{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Apellido'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Cargo:')!!}
			{!!Form::select('idCargo',(['' => 'Selecciona Cargo'] + $cargos),null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Email:')!!}
			{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('EmailSecretaria:')!!}
			{!!Form::text('email_secretaria',null,['class'=>'form-control','placeholder'=>'EmailSecretaria'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Fono:')!!}
			{!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Fono'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Movil:')!!}
			{!!Form::text('movil',null,['class'=>'form-control','placeholder'=>'Movil'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Area:')!!}
			{!!Form::select('idArea',(['' => 'Selecciona Area'] + $areas),null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Region:')!!}
			{!!Form::select('idRegion',(['' => 'Selecciona Region'] + $regions),null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('DireccionPostal:')!!}
			{!!Form::text('direccionPostal',null,['class'=>'form-control','placeholder'=>'direccionPostal'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Skype:')!!}
			{!!Form::text('skype',null,['class'=>'form-control','placeholder'=>'Skype'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Cumpleaños:')!!}
			{!!Form::date('cumpleaños',null,['class'=>'form-control','placeholder'=>'Skype'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Hobbies:')!!}
			{!!Form::text('hobbies',null,['class'=>'form-control','placeholder'=>'Tus hobbies separados por coma'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Facebook:')!!}
			{!!Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Url de tu Facebook'])!!}
		</div>

		<div class="form-group col-sm-4">
			{!!Form::label('Linkedin:')!!}
			{!!Form::text('linkedin',null,['class'=>'form-control','placeholder'=>'Url de tu Linkedin'])!!}
		</div>

		<input name="idCliente" type="hidden" value="<?php echo $idClienteActual;?>">
		<input type="hidden" name="idEstado" id="idEstado" value="1">