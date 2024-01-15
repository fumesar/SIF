@extends ('layouts.admin')
@section ('contenido')
    <div id="exportar2" class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Detalles de Matricular</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($matricular,['method'=>'GET','route'=>['matricular.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Semestre(*)</label>
                    <select name="idSemestre" class="form-control" disabled> 
                        @foreach ($semestres as $semestre)
                            <option 
                                <?php if($semestre->idSemestre==$matricular->idSemestre): ?>
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
	            	<label for="Documento">Documento</label>
	            	<input type="text" name="Documento" class="form-control" value="{{$matricular->Documento}}" placeholder="Documento..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{$matricular->Nombres}}" placeholder="Nombres..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{$matricular->Apellidos}}" placeholder="Apellidos..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Curso(*)</label>
                    <select name="idCurso" class="form-control" disabled> 
                        @foreach ($cursos as $curso)
                            <option 
                                <?php if($curso->idCurso==$matricular->idCurso): ?>
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
                    <select name="idEstadoMatricula" class="form-control" disabled> 
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
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection