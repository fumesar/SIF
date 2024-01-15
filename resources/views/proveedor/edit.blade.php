@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Proveedor: {{ $proveedor->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($proveedor,['method'=>'PATCH','route'=>['proveedor.update',$proveedor->idProveedor]])!!}
            {{Form::token()}}
			
			
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Tipo Documento(*)</label>
    				<select name="idTipoDocumento" class="form-control">
    					@foreach ($tipo_documentos as $tipo_documento)
    						<option 
    							<?php if($tipo_documento->idTipoDocumento==$proveedor->idTipoDocumento): ?>
                                        selected
    							<?php endif ?>
    							value="{{$tipo_documento->idTipoDocumento}}"> {{$tipo_documento->TipoDocumento}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NumeroDocumento">Numero Documento(*)</label>
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{$proveedor->NumeroDocumento}}" placeholder="Numero Documento(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{$proveedor->Nombres}}" placeholder="Nombres...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{$proveedor->Apellidos}}" placeholder="Apellidos...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Direccion">Direccion</label>
	            	<input type="text" name="Direccion" class="form-control" value="{{$proveedor->Direccion}}" placeholder="Direccion...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Departamento Residencia(*)</label>
    				<select name="idDepartamentoResidencia" class="form-control">
    					@foreach ($departamento_residencias as $departamento_residencia)
    						<option 
    							<?php if($departamento_residencia->idDepartamentoResidencia==$proveedor->idDepartamentoResidencia): ?>
                                        selected
    							<?php endif ?>
    							value="{{$departamento_residencia->idDepartamentoResidencia}}"> {{$departamento_residencia->DepartamentoResidencia}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="CiudadResidencia">Ciudad Residencia</label>
	            	<input type="text" name="CiudadResidencia" class="form-control" value="{{$proveedor->CiudadResidencia}}" placeholder="Ciudad Residencia...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{$proveedor->Telefono}}" placeholder="Telefono...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Celular">Celular</label>
	            	<input type="text" name="Celular" class="form-control" value="{{$proveedor->Celular}}" placeholder="Celular...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="PersonaContacto">Persona Contacto</label>
	            	<input type="text" name="PersonaContacto" class="form-control" value="{{$proveedor->PersonaContacto}}" placeholder="Persona Contacto...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="PaginaWeb">Pagina Web</label>
	            	<input type="text" name="PaginaWeb" class="form-control" value="{{$proveedor->PaginaWeb}}" placeholder="Pagina Web...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Correo">Correo</label>
	            	<input type="text" name="Correo" class="form-control" value="{{$proveedor->Correo}}" placeholder="Correo...">
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