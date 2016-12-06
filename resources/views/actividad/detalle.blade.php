
@extends('layouts.principal')
	@section('content')
	

	<div class="panel panel-default">
  		<div class="panel-heading">
			<b><i class="icon-bookmark">&nbsp;&nbsp;DATOS ACCIÓN</i></b>
		</div>
	</div>
	

	@foreach ($actividadActual as $act) 

		<ul>
			<li style="display: inline;"><b>Acción Principal:</b> &nbsp;&nbsp;{{$act->comentario}}&nbsp;&nbsp;|&nbsp;&nbsp;</li>
			<li style="display: inline;"><b>Tipo:</b> {{$act->tipo}}&nbsp;&nbsp;|&nbsp;&nbsp;</li>
			<li style="display: inline;"><b>Cliente:</b> &nbsp;&nbsp;{{$act->cliente}}&nbsp;&nbsp;|&nbsp;&nbsp;</li>
			<li style="display: inline;"><b>Contacto:</b> &nbsp;{{$act->contacto}}</li>
		</ul>

	@endforeach
	
		<div style="float:left">
			<button  type="button" class="btn btn-primary"  onclick="history.go(-1);">
				<i class="icon-chevron-sign-left icon-large">&nbsp;&nbsp;Atrás</i>
			</button>
		</div><br>

	<hr style=" border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);">

   	<h4 style="float:left">Reacciones Principales</h4>



   	<div style="float:right">
		<button  type="button" class="btn btn-primary " data-toggle="modal" data-target="#agregarActividadHijo">
			<i class="icon-plus-sign icon-large">&nbsp;&nbsp;Agregar Reacción</i>
		</button>
	</div>

	@include('actividad.creaAccionHijo')
   

   
  

   	<table class="table table-bordered table-striped table-hover " style="padding: 0">
   		<thead>
   			<th> Tipo       </th>
        	<th> Comentario </th>
        	<th> A cargo    </th>
        	<th> Estado     </th>
        	<th> Resultado  </th>
			<th> padre      </th>
			<th> Nivel 		</th>			
			<th> Acción     </th>				
		</thead>

					@foreach($actividadDetalle as $actividades)
						<tbody>
							
							<td><i class="{{$actividades->icono}}"></i>&nbsp;&nbsp;{{$actividades->tipo}}</td>
							<td>{{$actividades->comentario}}</td>
							<td>{{$actividades->nombreUsuario}}&nbsp;{{$actividades->apellidoUsuario}}</td>
							<td>{{$actividades->estado}}</td>
							<td>{{$actividades->resultado}}</td>
							<td>{{$actividades->padre}}</td>
							<td>{{$actividades->jerarquia}}</td>
							
							<td align="center">												
								<a href="detalle?accion={{$actividades->idActividad}}&cliente=<?php echo $idClienteActual;?>&contacto=3&padre=false"
								<i class='icon-eye-open icon-large' style='color:#297DEF'></i>
								</a>
							</td>
						</tbody>
					@endforeach
   	</table>


	




    <script type="text/javascript">
		//ponemos la clase active para que se pinte el menú
		var tabButton = document.getElementById("actividades");
		tabButton.className = "active";

		function recargarPaginaDetalleActividades() {
		    location.reload();
		}
	</script>

	

	@endsection

	@section('scripts')
		{!!Html::script('js/actividad.js')!!}
	@endsection

