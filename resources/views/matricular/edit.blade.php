@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Matricular</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
            @endif
			</div>

			{!!Form::model($matricular,['method'=>'PATCH','route'=>['matricular.update',$matricular->idMatricula]])!!}
            {{Form::token()}}
			
			
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Semestre(*)</label>
    				<select name="idSemestre" class="form-control">
    					@foreach ($semestres as $semestre)
    						<option 
                                {{ old('idSemestre',$matricular->idSemestre) == $semestre->idSemestre ? 'selected' : '' }} 
    							value="{{$semestre->idSemestre}}"> {{$semestre->Semestre}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
    		
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Documento">Documento</label>
	            	<input type="text" name="Documento" id="Documento" onchange="cambioDocumento();" class="form-control" value="{{old('Documento',$matricular->Documento)}}" placeholder="Documento...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres</label>
	            	<input type="text" name="Nombres" id="Nombres" class="form-control" value="{{old('Nombres',$matricular->Nombres)}}" placeholder="Nombres..." readonly>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos</label>
	            	<input type="text" name="Apellidos" id="Apellidos" class="form-control" value="{{old('Apellidos',$matricular->Apellidos)}}" placeholder="Apellidos..." readonly>
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Curso(*)</label>
    				<select name="idCurso" class="form-control">
    					@foreach ($cursos as $curso)
    						<option 
    							<?php if($curso->idCurso==old('idCurso',$matricular->idCurso)): ?>
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
    				<label>Estado Matricula(*)</label>
    				<select name="idEstadoMatricula" class="form-control">
    					@foreach ($estado_matriculas as $estado_matricula)
    						<option 
    							<?php if($estado_matricula->idEstadoMatricula==$matricular->idEstadoMatricula): ?>
                                        selected
    							<?php endif ?>
    							value="{{$estado_matricula->idEstadoMatricula}}"> {{$estado_matricula->EstadoMatricula}}
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
            <script src="{{asset('js/matricular.js')}}"></script>  
		</div>
	</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 
@endsection