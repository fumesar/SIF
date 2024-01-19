{!! Form::open(array('url'=>'prestamo_equipo','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<input type="image" src="{{asset('img/BUSCAR.png')}}" alt="Submit" width="35" height="35" style="margin-left: 10px;">
		</span>
	</div>
</div>

{{Form::close()}}