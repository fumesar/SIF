{!! Form::open(array('url'=>'asistencia_report','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Semestre(*)</label>
		<select name="idSemestre" id="idSemestre" class="form-control" onchange="filtrarCursos();">
			<option value="">Seleccionar</option>
			@foreach ($semestres as $semestre)
				<option {{ old('idSemestre',$query_idSemestre) == $semestre->idSemestre ? 'selected' : '' }}
					value="{{$semestre->idSemestre}}">{{$semestre->Semestre}}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Curso(*)</label>
		<select name="idCurso" id="idCurso" class="form-control">
  			<option value="">Seleccionar</option>
  			@foreach ($cursos as $curso)
	  			@if($curso->idSemestre==$query_idSemestre)
					<option {{ old('idCurso',$query_idCurso) == $curso->idCurso ? 'selected' : '' }}
						value="{{$curso->idCurso}}">{{$curso->NombreCurso}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>

<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
	  <div class="form-group">
	  	<label for="Mes">Mes</label>
	  	<input type="month" name="Mes" class="form-control" value="{{ old('Mes',$query_Mes) }}" placeholder="Mes...">
	  </div>
</div>

<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group text-right">
			<div class="input-group ">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Generar</button>
				</span>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 l-xs-12"></div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<a> <img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"> Presente </a>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<a> <img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" > Ausente </a>
	</div>	
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">	
		<a> <img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" > Tarde </a>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<a><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"> Licencia </a>
		
	</div>
</div>
<hr/>

{{Form::close()}}