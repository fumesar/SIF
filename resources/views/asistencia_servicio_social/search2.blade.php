{!! Form::open(array('url'=>'asistencia_servicio_social_report','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
	<div class="form-group">
		<label>Seccional(*)</label>
		<select name="idSeccional" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($seccionals as $seccional)
				<option {{ old('idSeccional',$query_idSeccional) == $seccional->idSeccional ? 'selected' : '' }}
					value="{{$seccional->idSeccional}}">{{$seccional->Seccional}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
	<div class="form-group">
		<label>Brigada(*)</label>
		<select name="idBrigada" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($brigadas as $brigada)
				<option {{ old('idBrigada',$query_idBrigada) == $brigada->idBrigada ? 'selected' : '' }}
					value="{{$brigada->idBrigada}}">{{$brigada->Brigada}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
	<div class="form-group">
		<label>Peloton(*)</label>
		<select name="idPeloton" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($pelotons as $peloton)
				<option {{ old('idPeloton',$query_idPeloton) == $peloton->idPeloton ? 'selected' : '' }}
					value="{{$peloton->idPeloton}}">{{$peloton->Peloton}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Colegio(*)</label>
		<select name="idColegio" class="form-control">
  		<option value="">Seleccionar</option>
			@foreach ($colegios as $colegio)
				<option {{ old('idColegio',$query_idColegio) == $colegio->idColegio ? 'selected' : '' }}
      			value="{{$colegio->idColegio}}">{{$colegio->Colegio}}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Semestre(*)</label>
		<select name="idSemestre" class="form-control">
  			<option value="">Seleccionar</option>
			@foreach ($semestres as $semestre)
				<option {{ old('idSemestre',$query_idSemestre) == $semestre->idSemestre ? 'selected' : '' }}
      			value="{{$semestre->idSemestre}}">{{$semestre->Semestre}}</option>
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
		<a><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"> Excusa </a>
	</div>
	
</div>
<hr/>

{{Form::close()}}