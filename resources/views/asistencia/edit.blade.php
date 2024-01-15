@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Asistencia: {{ $asistencia->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($asistencia,['method'=>'PATCH','route'=>['asistencia.update',$asistencia->idAsistencia]])!!}
            {{Form::token()}}
			
			
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Curso(*)</label>
    				<select name="idCurso" class="form-control">
    					@foreach ($cursos as $curso)
    						<option 
    							<?php if($curso->idCurso==$asistencia->idCurso): ?>
                                        selected
    							<?php endif ?>
    							value="{{$curso->idCurso}}"> {{$curso->NombreCurso}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Fecha">Fecha(*)</label>
	            	<input type="date" name="Fecha" class="form-control" value="{{$asistencia->Fecha}}" placeholder="Fecha(*)...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Matricular(*)</label>
    				<select name="idMatricula" class="form-control">
    					@foreach ($matriculars as $matricular)
    						<option 
    							<?php if($matricular->idMatricula==$asistencia->idMatricula): ?>
                                        selected
    							<?php endif ?>
    							value="{{$matricular->idMatricula}}"> {{$matricular->Nombres}}
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
    							<?php if($estado_asistencia->idEstadoAsistencia==$asistencia->idEstadoAsistencia): ?>
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