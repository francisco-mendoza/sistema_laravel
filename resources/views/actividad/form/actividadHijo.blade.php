


<div class="form-group" >
	<input class="form-control" name="idCliente" type="hidden" value="<?php echo $idClienteActual;?>">
</div>
			
<div class="form-group">
	<input class="form-control" name="idContacto" type="hidden" value="<?php echo $idContactoActual;?>">
	
</div>

<div class="form-group" >
	<input class="form-control" name="usuario" type="hidden" value="{!!Auth::user()->id!!}">
</div>


<div class="form-group">
	{!!Form::label('Comentario:')!!}
	{!!Form::text('comentario',null,['class'=>'form-control','placeholder'=>'Escribe tu comentario'])!!}
</div>


<div class="form-group">
	
	<input class="form-control" name="actPadre" type="hidden" value='<?php echo $idAccion; ?>' >
</div>





<?php foreach($JerarquiaActual as $jerarquias){ ?>				
<div class="form-group">
	
	<input class="form-control" name="jerarquia" type="hidden" value="<?php echo $jerarquias->jerarquia.'.'.$sqlJerarquia;?>">
</div>

<?php } ?>

<div class="form-group">
	{!!Form::label('Fecha:')!!}
	{!!Form::date('fecha', \Carbon\Carbon::now(),['class' => 'form-control']);!!}
</div>


<div class="form-group">
	{!!Form::label('Tipo Actividad:')!!}
	{!!Form::select('idTipoActividad',(['0' => 'Selecciona Tipo Actividad'] + $selTipoActividades),null,['class' => 'form-control','id'=>'tipoActividades']) !!}
</div>

<div class="form-group">
	{!!Form::label('Estado:')!!}
	<!--Cargando-->
	<div id="cargandoEstados" align="left" style="display: none;">&nbsp;&nbsp;		        
		<i class="icon-spinner icon-spin icon-2x"></i>
	</div>
    <!--/Cargando-->
	{!!Form::select('estado',['placeholder' => 'Selecciona Estado'] ,null,['class' => 'form-control','id'=>'estados']) !!}
</div>

<div class="form-group">
	{!!Form::label('Resultado:')!!}
	<div id="cargandoResultados" align="left" style="display: none;">&nbsp;&nbsp;		        
		<i class="icon-spinner icon-spin icon-2x"></i>
	</div>
	{!!Form::select('resultado',['placeholder' => 'Selecciona el Resultado'] ,null,['class' => 'form-control','id'=>'resultados']) !!}
</div>

<div class="form-group" style="display:none;" id="monto">
	{!!Form::label('Monto Cotización:')!!}
	<input class="form-control" name="monto"  type="text" >
</div>

<script type="text/javascript">
//Llenar combobox estado
	$("#tipoActividades").change(function(event){
		$("#estados").fadeOut(10);
		$("#cargandoEstados").fadeIn(10);
		$.get("estados/"+event.target.value+"",function(response,state){
			//console.log(response);
			$("#estados").fadeIn(10);
			$("#estados").empty();
			for(i=0; i<response.length; i++)
			{
				$("#estados").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
			}
			$("#cargandoEstados").fadeOut(10);

			// Si es cotización mostrar input monto
			var optionEstado = document.getElementById("tipoActividades");
			if(optionEstado.selectedIndex == 4)
			{
				$("#monto").fadeIn(10);
			}
			else
			{
				$("#monto").fadeOut(10);
			}
		});
	});

	$("#estados").change(function(event){
		
		$("#resultados").fadeOut(10);
		$("#cargandoResultados").fadeIn(10);
		
		$.get("resultados/"+event.target.value+"",function(response,state){
			//console.log(response);
			$("#resultados").fadeIn(10);
			$("#resultados").empty();
			for(i=0; i<response.length; i++)
			{
				$("#resultados").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
			}
			$("#cargandoResultados").fadeOut(10);
		});

	});

</script>

