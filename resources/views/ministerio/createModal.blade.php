<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Ministerio</h4>
      </div>
      <div class="modal-body">
      
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<input type="hidden" id="id">


        {!!Form::open(['route'=>'ministerio.store','method'=>'POST', 'id' => 'myForm'])!!}

    
   

          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          @include('ministerio.form.ministerio')
     




      </div>
      <div class="modal-footer">

       {!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
    
      
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>