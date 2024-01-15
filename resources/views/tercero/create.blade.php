@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Nuevo Tercero</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'tercero','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset id="InformacionPersonal" class="form-group">  
                <legend >INFORMACIÓN PERSONAL</legend>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Tipo Tercero(*)</label>
        				<select name="idTipoTercero" id="idTipoTercero" onchange="cambioTipoTercero();" class="form-control">
        					@foreach ($tipo_terceros as $tipo_tercero)
        						<option value="{{$tipo_tercero->idTipoTercero}}">{{$tipo_tercero->TipoTercero}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
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
                  	<label for="Nombres">Nombres(*)</label>
                  	<input type="text" name="Nombres" class="form-control" placeholder="Nombres...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Apellidos">Apellidos(*)</label>
                  	<input type="text" name="Apellidos" class="form-control" placeholder="Apellidos...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="FechaNacimiento">Fecha Nacimiento</label>
                  	<input type="date" name="FechaNacimiento" class="form-control" placeholder="FechaNacimiento...">
                  </div>
            </div>

        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Departamento Nacimiento(*)</label>
        				<select name="idDepartamentoNacimiento" class="form-control">
        					@foreach ($departamento_nacimientos as $departamento_nacimiento)
        						<option value="{{$departamento_nacimiento->idDepartamentoNacimiento}}">{{$departamento_nacimiento->DepartamentoNacimiento}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="CiudadNacimiento">Ciudad Nacimiento</label>
                  	<input type="text" name="CiudadNacimiento" class="form-control" placeholder="CiudadNacimiento...">
                  </div>
            </div>

        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Rh(*)</label>
        				<select name="idRH" class="form-control">
        					@foreach ($rhs as $rh)
        						<option value="{{$rh->idRH}}">{{$rh->RH}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Correo">Correo</label>
                  	<input type="text" name="Correo" class="form-control" placeholder="Correo...">
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
        				<label>Profesion(*)</label>
        				<select name="idProfesion" class="form-control">
        					@foreach ($profesions as $profesion)
        						<option value="{{$profesion->idProfesion}}">{{$profesion->Profesion}}</option>
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
        				<label>Nivel Academico(*)</label>
        				<select name="idNivelAcademico" class="form-control">
        					@foreach ($nivel_academicos as $nivel_academico)
        						<option value="{{$nivel_academico->idNivelAcademico}}">{{$nivel_academico->NivelAcademico}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Localidad(*)</label>
        				<select name="idLocalidad" class="form-control">
        					@foreach ($localidads as $localidad)
        						<option value="{{$localidad->idLocalidad}}">{{$localidad->Localidad}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Barrio">Barrio</label>
                  	<input type="text" name="Barrio" class="form-control" placeholder="Barrio...">
                  </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset id="InformacionInterna" class="form-group">  
                <legend >INFORMACIÓN INTERNA</legend>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Estado(*)</label>
        				<select name="idEstado" id="idEstado" onchange="cambioEstado();" class="form-control">
        					@foreach ($estados as $estado)
        						<option value="{{$estado->idEstado}}">{{$estado->Estado}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Cargo(*)</label>
        				<select name="idCargo" class="form-control">
        					@foreach ($cargos as $cargo)
        						<option value="{{$cargo->idCargo}}">{{$cargo->Cargo}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="FechaIngreso">Fecha Ingreso</label>
                  	<input type="date" name="FechaIngreso" class="form-control" placeholder="FechaIngreso...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="FechaRetiro">Fecha Retiro</label>
                  	<input type="date" name="FechaRetiro" class="form-control" placeholder="FechaRetiro...">
                  </div>
            </div>
           </fieldset>                
  			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit">Guardar</button>
		            	<button class="btn btn-danger" type="reset">Cancelar</button>
            		</div>
            	</div>	
        	</center>
			{!!Form::close()!!}		
      <script src="{{asset('js/tercero.js')}}"></script>      
		</div>
	</div>
@endsection