@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'proveedor','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Tipo Documento(*)</label>
        				<select name="idTipoDocumento" class="form-control">
        					@foreach ($tipo_documentos as $tipo_documento)
        						<option value="{{$tipo_documento->idTipoDocumento}}">{{$tipo_documento->TipoDocumento}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="NumeroDocumento">Numero Documento(*)</label>
                  	<input type="text" name="NumeroDocumento" class="form-control" placeholder="NumeroDocumento...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Nombres">Nombres</label>
                  	<input type="text" name="Nombres" class="form-control" placeholder="Nombres...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Apellidos">Apellidos</label>
                  	<input type="text" name="Apellidos" class="form-control" placeholder="Apellidos...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Direccion">Direccion</label>
                  	<input type="text" name="Direccion" class="form-control" placeholder="Direccion...">
                  </div>
            </div>

        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Departamento Residencia(*)</label>
        				<select name="idDepartamentoResidencia" class="form-control">
        					@foreach ($departamento_residencias as $departamento_residencia)
        						<option value="{{$departamento_residencia->idDepartamentoResidencia}}">{{$departamento_residencia->DepartamentoResidencia}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="CiudadResidencia">Ciudad Residencia</label>
                  	<input type="text" name="CiudadResidencia" class="form-control" placeholder="CiudadResidencia...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Telefono">Telefono</label>
                  	<input type="text" name="Telefono" class="form-control" placeholder="Telefono...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Celular">Celular</label>
                  	<input type="text" name="Celular" class="form-control" placeholder="Celular...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="PersonaContacto">Persona Contacto</label>
                  	<input type="text" name="PersonaContacto" class="form-control" placeholder="PersonaContacto...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="PaginaWeb">Pagina Web</label>
                  	<input type="text" name="PaginaWeb" class="form-control" placeholder="PaginaWeb...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Correo">Correo</label>
                  	<input type="text" name="Correo" class="form-control" placeholder="Correo...">
                  </div>
            </div>
                
  			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit">Guardar</button>
		            	<button class="btn btn-danger" type="reset">Cancelar</button>
            		</div>
            	</div>	
        	</center>
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection