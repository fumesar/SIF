<div class="modal fade" id="modal-delete-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  {{Form::Open(array('action'=>array('App\Http\Controllers\RolesControlador@destroy',$role->id),'method'=>'delete'))}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header colorModal">
        <h4 class="modal-title" id="exampleModalLabel">{{__('Eliminar')}} Rol
        <button type="button" class="btn-close btn-danger pull-right" data-dismiss="modal" aria-label="Close">X</button>
        </h4>
      </div>
      <div class="modal-body">
        <p>Confirme si desea Eliminar Rol</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cerrar')}}</button>
		<button type="submit" class="btn btn-primary">{{__('Confirmar')}}</button>
      </div>
    </div>
  </div>
  {{Form::Close()}}
</div>