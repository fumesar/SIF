@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Editar Servicio Social: {{ $servicio_social->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($servicio_social,['method'=>'PATCH','files'=>'true','route'=>['servicio_social.update',$servicio_social->idServicioSocial]])!!}
            {{Form::token()}}
			
			
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION GENERAL</legend>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Tipo Documento(*)</label>
    				<select name="idTipoDocumento" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($tipo_documentos as $tipo_documento)
    						<option 
    							{{ old('idTipoDocumento',$servicio_social->idTipoDocumento) == $tipo_documento->idTipoDocumento ? 'selected' : '' }}
                                value="{{$tipo_documento->idTipoDocumento}}"> {{$tipo_documento->TipoDocumento}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NumeroDocumento">Numero Documento(*)</label>
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{old('NumeroDocumento',$servicio_social->NumeroDocumento)}}" placeholder="Numero Documento(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres(*)</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{old('Nombres',$servicio_social->Nombres)}}" placeholder="Nombres(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos(*)</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{old('Apellidos',$servicio_social->Apellidos)}}" placeholder="Apellidos(*)...">
	            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{old('Telefono',$servicio_social->Telefono)}}" placeholder="Telefono...">
	            </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Direccion">Direccion</label>
	            	<input type="text" name="Direccion" class="form-control" value="{{old('Direccion',$servicio_social->Direccion)}}" placeholder="Direccion...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Departamento Residencia(*)</label>
    				<select name="idDepartamentoResidencia" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($departamento_residencias as $departamento_residencia)
    						<option 
                                {{ old('idDepartamentoResidencia',$servicio_social->idDepartamentoResidencia) == $departamento_residencia->idDepartamentoResidencia ? 'selected' : '' }} 
    							value="{{$departamento_residencia->idDepartamentoResidencia}}"> {{$departamento_residencia->DepartamentoResidencia}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="CiudadResidencia">Ciudad Residencia</label>
	            	<input type="text" name="CiudadResidencia" class="form-control" value="{{old('CiudadResidencia',$servicio_social->CiudadResidencia)}}" placeholder="Ciudad Residencia...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Correo">Correo</label>
	            	<input type="text" name="Correo" class="form-control" value="{{old('Correo',$servicio_social->Correo)}}" placeholder="Correo...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Localidad(*)</label>
    				<select name="idLocalidad" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($localidads as $localidad)
    						<option 
    							{{ old('idLocalidad',$servicio_social->idLocalidad) == $localidad->idLocalidad ? 'selected' : '' }} 
    							value="{{$localidad->idLocalidad}}"> {{$localidad->Localidad}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Barrio">Barrio</label>
	            	<input type="text" name="Barrio" class="form-control" value="{{old('Barrio',$servicio_social->Barrio)}}" placeholder="Barrio...">
	            </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION ACADEMICA</legend>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Colegio(*)</label>
    				<select name="idColegio" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($colegios as $colegio)
    						<option 
    							{{ old('idColegio',$servicio_social->idColegio) == $colegio->idColegio ? 'selected' : '' }} 
    							value="{{$colegio->idColegio}}"> {{$colegio->Colegio}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Curso Colegio(*)</label>
    				<select name="idCursoCol" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($curso_colegios as $curso_colegio)
    						<option 
    							{{ old('idCursoCol',$servicio_social->idCursoCol) == $curso_colegio->idCursoCol ? 'selected' : '' }} 
    							value="{{$curso_colegio->idCursoCol}}"> {{$curso_colegio->Curso}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Jornada(*)</label>
    				<select name="idJornada" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($jornadas as $jornada)
    						<option 
    							{{ old('idJornada',$servicio_social->idJornada) == $jornada->idJornada ? 'selected' : '' }} 
    							value="{{$jornada->idJornada}}"> {{$jornada->Jornada}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Horas">Horas</label>
	            	<input type="text" name="Horas" class="form-control" value="{{old('Horas',$servicio_social->Horas)}}" placeholder="Horas...">
	            </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION INTERNA</legend>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Estado(*)</label>
    				<select name="idEstado" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($estados as $estado)
    						<option 
                                {{ old('idEstado',$servicio_social->idEstado) == $estado->idEstado ? 'selected' : '' }} 
    							value="{{$estado->idEstado}}"> {{$estado->Estado}}
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
    							{{ old('idSeccional',$servicio_social->idSeccional) == $seccional->idSeccional ? 'selected' : '' }} 
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
    							{{ old('idBrigada',$servicio_social->idBrigada) == $brigada->idBrigada ? 'selected' : '' }} 
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
    							{{ old('idPeloton',$servicio_social->idPeloton) == $peloton->idPeloton ? 'selected' : '' }} 
    							value="{{$peloton->idPeloton}}"> {{$peloton->Peloton}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaIngreso">Fecha Ingreso</label>
	            	<input type="date" name="FechaIngreso" class="form-control" value="{{old('FechaIngreso',$servicio_social->FechaIngreso)}}" placeholder="Fecha Ingreso...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaFinalizacion">Fecha Finalizacion</label>
	            	<input type="date" name="FechaFinalizacion" class="form-control" value="{{old('FechaFinalizacion',$servicio_social->FechaFinalizacion)}}" placeholder="Fecha Finalizacion...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Semestre(*)</label>
    				<select name="idSemestre" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($semestres as $semestre)
    						<option 
    							{{ old('idSemestre',$servicio_social->idSemestre) == $semestre->idSemestre ? 'selected' : '' }} 
    							value="{{$semestre->idSemestre}}"> {{$semestre->Semestre}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>           </fieldset>
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
@push('scripts')
<script src="{{asset('js/servicio_social.js')}}"></script>   
@endpush  
@endsection