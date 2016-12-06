<div class="modal fade" id="agregarContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Contacto</h4>
      </div>
      <div class="modal-body">

        <div id="mensajeErrorContacto" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
          <strong id="msj"></strong>
        </div>
      
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<input type="hidden" id="id">

         {!!Form::open(['route'=>'contacto.store','method'=>'POST', 'id' => 'formContacto'])!!}

    
    

            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
              @include('cliente.form.contacto')
      
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
         {!!link_to('#', $title='Registrar', $attributes = ['id'=>'registroContacto', 'class'=>'btn btn-primary'], $secure = null)!!}
        {!!Form::close()!!}<!--ojo aca, colocar abajo si no funciona -->
      </div>

    </div>
  </div>
</div>

<script>
  $("#agregarContacto").draggable({
    handle: ".modal-header"
  });
</script>