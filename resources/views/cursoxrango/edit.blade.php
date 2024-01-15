@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cursoxrango: {{ $cursoxrango->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cursoxrango,['method'=>'PATCH','route'=>['cursoxrango.update',$cursoxrango->idCursoxRango]])!!}
            {{Form::token()}}
			
			
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Rango(*)</label>
    				<select name="idRango" class="form-control">
    					@foreach ($rangos as $rango)
    						<option 
    							<?php if($rango->idRango==$cursoxrango->idRango): ?>
                                        selected
    							<?php endif ?>
    							value="{{$rango->idRango}}"> {{$rango->Rango}}
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
    							<?php if($curso->idCurso==$cursoxrango->idCurso): ?>
                                        selected
    							<?php endif ?>
    							value="{{$curso->idCurso}}"> {{$curso->NombreCurso}}
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