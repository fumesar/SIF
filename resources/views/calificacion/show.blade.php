@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Calificacion: {{ $calificacion->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($calificacion,['method'=>'GET','route'=>['calificacion.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Semestre(*)</label>
                    <select name="idSemestre" class="form-control" disabled> 
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
                    <select name="idCurso" class="form-control" disabled> 
                        @foreach ($cursos as $curso)
                            <option 
                                <?php if($curso->idCurso==$calificacion->idCurso): ?>
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
                    <select name="idAsignatura" class="form-control" disabled> 
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
                    <select name="idJefatura" class="form-control" disabled> 
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
	            	<input type="text" name="Nota" class="form-control" value="{{$calificacion->Nota}}" placeholder="Nota..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Promedio">Promedio</label>
	            	<input type="text" name="Promedio" class="form-control" value="{{$calificacion->Promedio}}" placeholder="Promedio..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\CalificacionControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection