@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Editar Jefatura: {{ $jefatura->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($jefatura,['method'=>'PATCH','files'=>'true','route'=>['jefatura.update',$jefatura->idJefatura]])!!}
            {{Form::token()}}
			
			
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION PERSONAL</legend>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Tipo Documento(*)</label>
    				<select name="idTipoDocumento" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($tipo_documentos as $tipo_documento)
    						<option 
                                {{ old('idTipoDocumento',$jefatura->idTipoDocumento) == $tipo_documento->idTipoDocumento ? 'selected' : '' }} 
    							value="{{$tipo_documento->idTipoDocumento}}"> {{$tipo_documento->TipoDocumento}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NumeroDocumento">Numero Documento(*)</label>
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{old('NumeroDocumento',$jefatura->NumeroDocumento)}}" placeholder="Numero Documento(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres(*)</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{old('Nombres',$jefatura->Nombres)}}" placeholder="Nombres(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos(*)</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{old('Apellidos',$jefatura->Apellidos)}}" placeholder="Apellidos(*)...">
	            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Foto">Foto</label>
                    <input type="file" name="Foto" id="Foto" class="form-control" value="{{old('Foto',$jefatura->Foto)}}" placeholder="Foto..." accept="image/*" onchange="colocarFoto();">

                    <div class="text-center">
                        <img src="{{Storage::url($jefatura->Foto)}}" alt="Sin imagen" height="200px" width="200px" class="img-thumbnail">

                        <a href="javascript:void(0);" onclick="limpiarFoto();">
                            <span class="badge badge-danger">X</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaNacimiento">Fecha Nacimiento</label>
	            	<input type="date" name="FechaNacimiento" class="form-control" value="{{old('FechaNacimiento',$jefatura->FechaNacimiento)}}" placeholder="Fecha Nacimiento...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Departamento Nacimiento(*)</label>
    				<select name="idDepartamentoNacimiento" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($departamento_nacimientos as $departamento_nacimiento)
    						<option 
                                  {{ old('idDepartamentoNacimiento',$jefatura->idDepartamentoNacimiento) == $departamento_nacimiento->idDepartamentoNacimiento ? 'selected' : '' }} 
    							value="{{$departamento_nacimiento->idDepartamentoNacimiento}}"> {{$departamento_nacimiento->DepartamentoNacimiento}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="CiudadNacimiento">Ciudad Nacimiento</label>
	            	<input type="text" name="CiudadNacimiento" class="form-control" value="{{old('CiudadNacimiento',$jefatura->CiudadNacimiento)}}" placeholder="Ciudad Nacimiento...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Rh(*)</label>
    				<select name="idRH" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($rhs as $rh)
    						<option 
                                {{ old('idRH',$jefatura->idRH) == $rh->idRH ? 'selected' : '' }} 
    							value="{{$rh->idRH}}"> {{$rh->RH}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Correo">Correo</label>
	            	<input type="text" name="Correo" class="form-control" value="{{old('Correo',$jefatura->Correo)}}" placeholder="Correo...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{old('Telefono',$jefatura->Telefono)}}" placeholder="Telefono...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Nivel Academico(*)</label>
    				<select name="idNivelAcademico" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($nivel_academicos as $nivel_academico)
    						<option 
                                {{ old('idNivelAcademico',$jefatura->idNivelAcademico) == $nivel_academico->idNivelAcademico ? 'selected' : '' }}
    							value="{{$nivel_academico->idNivelAcademico}}"> {{$nivel_academico->NivelAcademico}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Direccion">Direccion</label>
	            	<input type="text" name="Direccion" class="form-control" value="{{old('Direccion',$jefatura->Direccion)}}" placeholder="Direccion...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Departamento Residencia(*)</label>
    				<select name="idDepartamentoResidencia" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($departamento_residencias as $departamento_residencia)
    						<option 
                                {{ old('idDepartamentoResidencia',$jefatura->idDepartamentoResidencia) == $departamento_residencia->idDepartamentoResidencia ? 'selected' : '' }} 
    							value="{{$departamento_residencia->idDepartamentoResidencia}}"> {{$departamento_residencia->DepartamentoResidencia}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="CiudadResidencia">Ciudad Residencia</label>
	            	<input type="text" name="CiudadResidencia" class="form-control" value="{{old('CiudadResidencia',$jefatura->CiudadResidencia)}}" placeholder="Ciudad Residencia...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Localidad(*)</label>
    				<select name="idLocalidad" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($localidads as $localidad)
    						<option 
                                {{ old('idLocalidad',$jefatura->idLocalidad) == $localidad->idLocalidad ? 'selected' : '' }} 
    							value="{{$localidad->idLocalidad}}"> {{$localidad->Localidad}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Barrio">Barrio</label>
	            	<input type="text" name="Barrio" class="form-control" value="{{old('Barrio',$jefatura->Barrio)}}" placeholder="Barrio...">
	            </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION INTERNA</legend>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Estado Jefatura(*)</label>
    				<select name="idEstado" id="idEstado" onchange="cambioEstado();" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($estado_jefaturas as $estado_jefatura)
    						<option 
                                {{ old('idEstado',$jefatura->idEstado) == $estado_jefatura->idEstado ? 'selected' : '' }} 
    							value="{{$estado_jefatura->idEstado}}"> {{$estado_jefatura->Estado}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Rango(*)</label>
    				<select name="idRango" class="form-control" disabled>
                        <option value="">Seleccionar</option>
    					@foreach ($rangos as $rango)
    						<option 
                                {{ old('idRango',$jefatura->idRango) == $rango->idRango ? 'selected' : '' }} 
    							value="{{$rango->idRango}}"> {{$rango->Rango}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Cargo(*)</label>
    				<select name="idCargo" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($cargos as $cargo)
    						<option 
                                {{ old('idCargo',$jefatura->idCargo) == $cargo->idCargo ? 'selected' : '' }} 
    							value="{{$cargo->idCargo}}"> {{$cargo->Cargo}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Seccional(*)</label>
    				<select name="idSeccional" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($seccionals as $seccional)
    						<option 
                                {{ old('idSeccional',$jefatura->idSeccional) == $seccional->idSeccional ? 'selected' : '' }} 
    							value="{{$seccional->idSeccional}}"> {{$seccional->Seccional}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Brigada(*)</label>
    				<select name="idBrigada" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($brigadas as $brigada)
    						<option 
                                {{ old('idBrigada',$jefatura->idBrigada) == $brigada->idBrigada ? 'selected' : '' }} 
    							value="{{$brigada->idBrigada}}"> {{$brigada->Brigada}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Peloton(*)</label>
    				<select name="idPeloton" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($pelotons as $peloton)
    						<option 
                                {{ old('idPeloton',$jefatura->idPeloton) == $peloton->idPeloton ? 'selected' : '' }} 
    							value="{{$peloton->idPeloton}}"> {{$peloton->Peloton}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaIngreso">Fecha Ingreso</label>
	            	<input type="date" name="FechaIngreso" id="FechaIngreso" onchange="calcularAntiguedad();" class="form-control" value="{{old('FechaIngreso',$jefatura->FechaIngreso)}}" placeholder="Fecha Ingreso...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Puesto(*)</label>
    				<select name="idPuesto" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($puestos as $puesto)
    						<option 
                                {{ old('idPuesto',$jefatura->idPuesto) == $puesto->idPuesto ? 'selected' : '' }} 
    							value="{{$puesto->idPuesto}}"> {{$puesto->Puesto}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Antiguedad">Antiguedad</label>
	            	<input type="text" name="Antiguedad" id="Antiguedad" class="form-control" value="{{old('Antiguedad',$jefatura->Antiguedad)}}" placeholder="Antiguedad...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div id="FechaAscenso" class="form-group">
	            	<label for="FechaAscenso">Fecha Ascenso</label>
	            	<input type="date" name="FechaAscenso" class="form-control" value="{{old('FechaAscenso',$jefatura->FechaAscenso)}}" placeholder="Fecha Ascenso...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div id="FechaRetiro" class="form-group">
	            	<label for="FechaRetiro">Fecha Retiro</label>
	            	<input type="date" name="FechaRetiro" class="form-control" value="{{old('FechaRetiro',$jefatura->FechaRetiro)}}" placeholder="Fecha Retiro...">
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
            @push('scripts')
            <script src="{{asset('js/jefatura.js')}}"></script>   
            @endpush 
		</div>
	</div>
@endsection