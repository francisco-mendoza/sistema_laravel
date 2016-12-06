<div class="form-group col-sm-4">
    {!!Form::label('* Ministerio:')!!}
    {!! Form::select('idMinisterio',(['' => 'Selecciona un Ministerio'] + $ministerios),null,['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    <label>* Razón Social:</label>
    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
</div>

<div class="form-group col-sm-4">
    <script>
        $(document).ready(function() {
            $('#rut').Rut({
                on_error: function(){
                    $('#errorRut').show();
                    $("#rut").css("border","1px solid #FF3D3D");
                    $("#rut").css("background-color","#FFF");
                },
                on_success: function(){
                    $('#errorRut').hide();
                    $("#rut").css("border","1px solid #218818");
                    //$("#rut").css("background-color","#D3FFD8");
                },
                format_on: 'keyup'
            });
        });

    </script>
    {!!Form::label('* Rut:')!!}
    {!!Form::text('rut',null,['class'=>'form-control required rut','id'=>'rut','placeholder'=>'Rut'])!!}
    <div id="errorRut" style="color: #c9302c;display: none">Rut incorrecto</div>
</div>


<div class="form-group col-sm-4">
    {!!Form::label('Codigo:')!!}
    {!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo'])!!}
</div>

<div class="form-group col-sm-4">
    {!!Form::label('Sigla:')!!}
    {!!Form::text('sigla',null,['class'=>'form-control','placeholder'=>'Sigla'])!!}
</div>

<div class="form-group col-sm-4">
    {!!Form::label('* Region:')!!}
    {!! Form::select('idRegion',(['' => 'Selecciona Region'] + $regions),null,['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-4">
    {!!Form::label('Direccion:')!!}
    {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección'])!!}
</div>

<div class="form-group col-sm-4">
    {!!Form::label('N Trabajadores:')!!}
    {!!Form::text('numeroTrabajadores',null,['class'=>'form-control','placeholder'=>'Trabajadores'])!!}
</div>

<div class="form-group col-sm-4">
    {!!Form::label('* Email:')!!}

    {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])!!}
</div>

<div class="form-group col-sm-4">

    {!!Form::label('direccionWeb:')!!}
    {!!Form::text('direccionWeb',null,['class'=>'form-control','id'=>'url','placeholder'=>'direccionWeb'])!!}
</div>

<div class="form-group col-sm-4">
    {!!Form::label('* Fono:')!!}
    {!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Fono'])!!}
</div>
<div class="form-group col-sm-4">
    {!!Form::label('Fono Contacto:')!!}
    {!!Form::text('fonoContacto',null,['class'=>'form-control','placeholder'=>'Fono Contacto'])!!}
</div>
<div class="form-group col-sm-4">
    {!!Form::label('Fono Jefe Directo:')!!}
    {!!Form::text('fonoJefeDirecto',null,['class'=>'form-control','placeholder'=>'Fono Jefe Directo'])!!}
</div>
<div class="form-group col-sm-4">
    {!!Form::label('Fono Secretaria:')!!}
    {!!Form::text('fonoSecretaria',null,['class'=>'form-control','placeholder'=>'Fono Secretaria'])!!}
</div>

<div class="form-group col-sm-4">
    {!!Form::label('Skype:')!!}
    {!!Form::text('skype',null,['class'=>'form-control','placeholder'=>'skype'])!!}
</div>

<div class="form-group col-sm-4">
    {!!Form::label('* Sector:')!!}
    {!! Form::select('idTipoCliente',(['0' => 'Seleccione Sector Cliente'] + $tipoClientes),null,['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    <script>
        $(function() {
            $("#presupuesto").maskMoney({prefix:'$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false,precision: 0});
        })
    </script>
    {!!Form::label('Presupuesto:')!!}
    {!!Form::text('presupuesto',null,['class'=>'form-control','id'=>'presupuesto','placeholder'=>'presupuesto'])!!}
</div>

<p>* Obligatorio</p>

