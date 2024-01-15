{!! Form::open(array('url'=>'tercero_report','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Tipo Tercero(*)</label>
		<select name="idTipoTercero" id="idTipoTercero" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($tipo_terceros as $tipo_tercero)
				<option {{ old('idTipoTercero',$query_idTipoTercero) == $tipo_tercero->idTipoTercero ? 'selected' : '' }}
					value="{{$tipo_tercero->idTipoTercero}}">{{$tipo_tercero->TipoTercero}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Estado(*)</label>
		<select name="idEstado" id="idEstado" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($estados as $estado)
				<option {{ old('idEstado',$query_idEstado) == $estado->idEstado ? 'selected' : '' }}
					value="{{$estado->idEstado}}">{{$estado->Estado}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group text-right">
			<div class="input-group ">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</span>
			</div>
		</div>
	</div>
</div>
<hr>
{{Form::close()}}