<!-- roles show.blade.php    Ver Detalle de Roles -->
<div class="modal fade" id="modal-ver-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_roles_Ver_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header colorShow">
        <h4 class="modal-title" id="modal_roles_Ver_LongTitle">Detalle de Role
          <button type="button" class="btn-close btn-info pull-right" data-dismiss="modal" aria-label="Close">X</button>
        </h4>
      </div>
      {!!Form::model($roles,['method'=>'GET','route'=>['roles.index']])!!}
      {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
           		<div class="form-group">
	            	<label for="name">Rol(*)</label>
	            	<input type="text" name="name" class="form-control" value="{{$role->name}}" disabled>
	            </div>
            </div>
            
            <div class="col-lg-12">
           		<div class="form-group">
	            	<label for="guard_name">Aplicación(*)</label>
	            	<input type="text" name="guard_name" class="form-control" value="{{$role->guard_name}}" disabled>
	            </div>
            </div>
            
            
          </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" data-dismiss="modal" title="Regresar al Listado Anterior">{{__('Volver')}}</a>
      </div>
      {!!Form::close()!!} 
    </div>
  </div>
</div>