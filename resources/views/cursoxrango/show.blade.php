@extends ('layouts.admin')
@section ('contenido')
   
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Cursoxrango: {{ $cursoxrango->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cursoxrango,['method'=>'GET','route'=>['cursoxrango.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rango(*)</label>
                    <select name="idRango" class="form-control" disabled> 
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
                    <select name="idCurso" class="form-control" disabled> 
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
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\CursoxrangoControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection