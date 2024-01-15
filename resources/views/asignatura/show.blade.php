@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Asignatura: {{ $asignatura->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($asignatura,['method'=>'GET','route'=>['asignatura.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NombreAsignatura">Nombre Asignatura(*)</label>
	            	<input type="text" name="NombreAsignatura" class="form-control" value="{{$asignatura->NombreAsignatura}}" placeholder="Nombre Asignatura(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Curso(*)</label>
                    <select name="idCurso" class="form-control" disabled>
                        @foreach ($cursos as $curso)
                            <option 
                                <?php if($curso->idCurso==$asignatura->idCurso): ?>
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
                    <label>Instructor(*)</label>
                    <select name="idinstructor" class="form-control" disabled>
                        @foreach ($instructors as $instructor)
                            <option 
                                <?php if($instructor->idinstructor==$asignatura->idinstructor): ?>
                                        selected
                                <?php endif ?>
                                value="{{$instructor->idinstructor}}"> {{$instructor->Nombres}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estado(*)</label>
                    <select name="idEstado" class="form-control" disabled>
                        @foreach ($estados as $estado)
                            <option 
                                <?php if($estado->idEstado==$asignatura->idEstado): ?>
                                        selected
                                <?php endif ?>
                                value="{{$estado->idEstado}}"> {{$estado->Estado}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\AsignaturaControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
		</div>
	</div>
	
@endsection