{!! Form::open(array('url'=>'anotacion_report','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"></div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Tipo Anotacion(*)</label>
		<select name="idTipoAnotacion" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($tipo_anotacions as $tipo_anotacion)
				<option 
					{{ old('idTipoAnotacion',$query_idTipoAnotacion) == $tipo_anotacion->idTipoAnotacion ? 'selected' : '' }}
					value="{{$tipo_anotacion->idTipoAnotacion}}"> {{$tipo_anotacion->TipoAnotacion}}
				</option>
			@endforeach
		</select>
	</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label>Falta(*)</label>
		<select name="idfalta" class="form-control">
			<option value="">Seleccionar</option>
			@foreach ($faltas as $falta)
				<option 
					{{ old('idfalta',$query_idfalta) == $falta->idfalta ? 'selected' : '' }}
					value="{{$falta->idfalta}}"> {{$falta->Falta}}
				</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"></div>
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


