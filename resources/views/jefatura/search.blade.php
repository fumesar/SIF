{!! Form::open(array('url'=>'jefatura_report','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Estado Jefatura(*)</label>
		<select name="idEstado" id="idEstado" onchange="cambioEstado();" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($estado_jefaturas as $estado_jefatura)
				<option 
				{{ old('idEstado',$query_idEstado) == $estado_jefatura->idEstado ? 'selected' : '' }}
				value="{{$estado_jefatura->idEstado}}">{{$estado_jefatura->Estado}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Rango(*)</label>
		<select name="idRango" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($rangos as $rango)
				<option {{ old('idRango',$query_idRango) == $rango->idRango ? 'selected' : '' }}
					value="{{$rango->idRango}}">{{$rango->Rango}}</option>
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