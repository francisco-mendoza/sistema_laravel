<div class="modal fade" id="agregaAccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:rgba(167, 167, 167, 0.35);">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Actividad</h4>
      </div>
      <div class="modal-body">



          <div id="mensajeErrorActividad" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
            <strong id="msj"></strong>
          </div>


      
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<input type="hidden" id="id">





        {!!Form::open(['route'=>'actividad.store','method'=>'POST', 'id' => 'myForm'])!!}

              <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
              @include('actividad.form.actividad')


      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

        {!!link_to('#', $title='Registrar', $attributes = ['id'=>'registroActividad', 'class'=>'btn btn-primary'], $secure = null)!!}

      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>

<script>
$("#agregaAccion").draggable({
    handle: ".modal-header"
});
</script>