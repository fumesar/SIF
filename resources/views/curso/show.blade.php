@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Curso: {{ $curso->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($curso,['method'=>'GET','route'=>['curso.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NombreCurso">Nombre Curso(*)</label>
	            	<input type="text" name="NombreCurso" class="form-control" value="{{$curso->NombreCurso}}" placeholder="Nombre Curso(*)..." disabled>
	            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Semestre(*)</label>
                    <select name="idSemestre" class="form-control" disabled> 
                        @foreach ($semestres as $semestre)
                            <option 
                                <?php if($semestre->idSemestre==$curso->idSemestre): ?>
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
                    <label>Estado(*)</label>
                    <select name="idEstado" class="form-control" disabled> 
                        @foreach ($estados as $estado)
                            <option 
                                <?php if($estado->idEstado==$curso->idEstado): ?>
                                        selected
                                <?php endif ?>
                                value="{{$estado->idEstado}}"> {{$estado->Estado}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\CursoControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
            
		</div>
	</div>
	
@endsection