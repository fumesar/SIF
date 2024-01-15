@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Calificacion: {{ $calificacion->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($calificacion,['method'=>'PATCH','route'=>['calificacion.update',$calificacion->idCalificacion]])!!}
            {{Form::token()}}
			
			
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Semestre(*)</label>
    				<select name="idSemestre" class="form-control">
    					@foreach ($semestres as $semestre)
    						<option 
    							<?php if($semestre->idSemestre==$calificacion->idSemestre): ?>
                                        selected
    							<?php endif ?>
    							value="{{$semestre->idSemestre}}"> {{$semestre->Semestre}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Curso(*)</label>
    				<select name="idCurso" class="form-control">
    					@foreach ($cursos as $curso)
    						<option 
    							<?php if($curso->idCurso===$calificacion->idCurso): ?>
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
    				<label>Asignatura(*)</label>
    				<select name="idAsignatura" class="form-control">
    					@foreach ($asignaturas as $asignatura)
    						<option 
    							<?php if($asignatura->idAsignatura==$calificacion->idAsignatura): ?>
                                        selected
    							<?php endif ?>
    							value="{{$asignatura->idAsignatura}}"> {{$asignatura->NombreAsignatura}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Jefatura(*)</label>
    				<select name="idJefatura" class="form-control">
    					@foreach ($jefaturas as $jefatura)
    						<option 
    							<?php if($jefatura->idJefatura==$calificacion->idJefatura): ?>
                                        selected
    							<?php endif ?>
    							value="{{$jefatura->idJefatura}}"> {{$jefatura->Nombres}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nota">Nota</label>
	            	<input type="text" name="Nota" class="form-control" value="{{$calificacion->Nota}}" placeholder="Nota...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Promedio">Promedio</label>
	            	<input type="text" name="Promedio" class="form-control" value="{{$calificacion->Promedio}}" placeholder="Promedio...">
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