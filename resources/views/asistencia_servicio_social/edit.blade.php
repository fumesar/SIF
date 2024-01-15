@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Asistencia Servicio Social: {{ $asistencia_servicio_social->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($asistencia_servicio_social,['method'=>'PATCH','route'=>['asistencia_servicio_social.update',$asistencia_servicio_social->idAsistencia]])!!}
            {{Form::token()}}
			
			
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Seccional(*)</label>
    				<select name="idSeccional" class="form-control">
    					@foreach ($seccionals as $seccional)
    						<option 
    							<?php if($seccional->idSeccional==$asistencia_servicio_social->idSeccional): ?>
                                        selected
    							<?php endif ?>
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
    					@foreach ($brigadas as $brigada)
    						<option 
    							<?php if($brigada->idBrigada==$asistencia_servicio_social->idBrigada): ?>
                                        selected
    							<?php endif ?>
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
    					@foreach ($pelotons as $peloton)
    						<option 
    							<?php if($peloton->idPeloton==$asistencia_servicio_social->idPeloton): ?>
                                        selected
    							<?php endif ?>
    							value="{{$peloton->idPeloton}}"> {{$peloton->Peloton}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Fecha">Fecha(*)</label>
	            	<input type="date" name="Fecha" class="form-control" value="{{$asistencia_servicio_social->Fecha}}" placeholder="Fecha(*)...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Serviciosocial(*)</label>
    				<select name="idServicioSocial" class="form-control">
    					@foreach ($serviciosocials as $serviciosocial)
    						<option 
    							<?php if($serviciosocial->==$asistencia_servicio_social->idServicioSocial): ?>
                                        selected
    							<?php endif ?>
    							value="{{$serviciosocial->}}"> {{$serviciosocial->}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Estado Asistencia(*)</label>
    				<select name="idEstadoAsistencia" class="form-control">
    					@foreach ($estado_asistencias as $estado_asistencia)
    						<option 
    							<?php if($estado_asistencia->idEstadoAsistencia==$asistencia_servicio_social->idEstadoAsistencia): ?>
                                        selected
    							<?php endif ?>
    							value="{{$estado_asistencia->idEstadoAsistencia}}"> {{$estado_asistencia->EstadoAsistencia}}
    						</option>
    					@endforeach
    				</select>
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