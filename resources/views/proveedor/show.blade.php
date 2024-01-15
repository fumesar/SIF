@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Proveedor: {{ $proveedor->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($proveedor,['method'=>'GET','route'=>['proveedor.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo Documento(*)</label>
                    <select name="idTipoDocumento" class="form-control" disabled> 
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
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{$proveedor->NumeroDocumento}}" placeholder="Numero Documento(*)..." disabled >
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{$proveedor->Nombres}}" placeholder="Nombres..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{$proveedor->Apellidos}}" placeholder="Apellidos..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Direccion">Direccion</label>
	            	<input type="text" name="Direccion" class="form-control" value="{{$proveedor->Direccion}}" placeholder="Direccion..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento Residencia(*)</label>
                    <select name="idDepartamentoResidencia" class="form-control" disabled> 
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
	            	<input type="text" name="CiudadResidencia" class="form-control" value="{{$proveedor->CiudadResidencia}}" placeholder="Ciudad Residencia..." disabled> 
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{$proveedor->Telefono}}" placeholder="Telefono..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Celular">Celular</label>
	            	<input type="text" name="Celular" class="form-control" value="{{$proveedor->Celular}}" placeholder="Celular..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="PersonaContacto">Persona Contacto</label>
	            	<input type="text" name="PersonaContacto" class="form-control" value="{{$proveedor->PersonaContacto}}" placeholder="Persona Contacto..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="PaginaWeb">Pagina Web</label>
	            	<input type="text" name="PaginaWeb" class="form-control" value="{{$proveedor->PaginaWeb}}" placeholder="Pagina Web..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Correo">Correo</label>
	            	<input type="text" name="Correo" class="form-control" value="{{$proveedor->Correo}}" placeholder="Correo..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\ProveedorControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection