<div class="modal fade" id="modal_Roles_Create" tabindex="-1" role="dialog" aria-labelledby="modal_Roles_Create_Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header colorCreate">
        <h4 class="modal-title" id="modal_Roles_Create_LongTitle">{{__('Nuevo')}} Role
          <button type="button" class="btn btn-close btn-success pull-right" data-dismiss="modal" aria-label="Close">X</button>
        </h4>
      </div>
      {!!Form::open(array('url'=>'roles','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
      {{Form::token()}}
      <div class="modal-body">
          <div class="row">
            <div class="col-lg-12"> 
              <div class="form-group">
              	<label for="name">Rol(*)</label>
              	<input type="text" name="name"  class="form-control" placeholder="Ingrese aquí Rol(*)..." required>
              </div>
            </div>
            
            <div class="col-lg-12"> 
              <div class="form-group">
              	<label for="guard_name">Aplicación(*)</label>
              	<input type="text" name="guard_name"  class="form-control" placeholder="Ingrese aquí Aplicación(*)..." required>
              </div>
            </div>
            
            
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">{{__('Guardar')}}</button>
        <button class="btn btn-danger" type="reset">{{__('Cancelar')}}</button>
      </div>
      {!!Form::close()!!} 
    </div>
  </div>
</div>