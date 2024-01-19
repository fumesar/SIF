{!! Form::open(array('url'=>'servicio_social_report','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Estado(*)</label>
		<select name="idEstado" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($estados as $estado)
				<option {{ old('idEstado',$query_idEstado) == $estado->idEstado ? 'selected' : '' }}
					value="{{$estado->idEstado}}">{{$estado->Estado}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Colegio(*)</label>
		<select name="idColegio" class="form-control">
            <option value="">Seleccionar</option>
			@foreach ($colegios as $colegio)
				<option 
					{{ old('idColegio',$query_idColegio) == $colegio->idColegio ? 'selected' : '' }} 
					value="{{$colegio->idColegio}}"> {{$colegio->Colegio}}
				</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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


<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group text-right">
			<div class="input-group ">
				<span class="input-group-btn">
					<input type="image" src="{{asset('img/BUSCAR.png')}}" alt="Submit" width="40" height="40" style="margin-right: 15px;">
				</span>
			</div>
		</div>
	</div>
</div>
<hr>
{{Form::close()}}