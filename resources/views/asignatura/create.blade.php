@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Asignatura</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'asignatura','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="NombreAsignatura">Nombre Asignatura(*)</label>
                  	<input type="text" name="NombreAsignatura" class="form-control" placeholder="NombreAsignatura...">
                  </div>
            </div>

        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Curso(*)</label>
        				<select name="idCurso" class="form-control">
        					@foreach ($cursos as $curso)
        						<option value="{{$curso->idCurso}}">{{$curso->NombreCurso}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Instructor(*)</label>
        				<select name="idinstructor" class="form-control">
        					@foreach ($instructors as $instructor)
        						<option value="{{$instructor->idinstructor}}">{{$instructor->Apellidos.','.$instructor->Nombres}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Estado(*)</label>
        				<select name="idEstado" class="form-control">
        					@foreach ($estados as $estado)
        						<option value="{{$estado->idEstado}}">{{$estado->Estado}}</option>
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