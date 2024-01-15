@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Asistencia Servicio Social <a href="asistencia_servicio_social/create"><!-- <button class="btn btn-success">Nuevo</button> --></a></h3>
		
	</div>
</div>
@include('asistencia_servicio_social.search')
<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 l-xs-12"></div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<a> <img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"> Presente </a>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<a> <img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" > Ausente </a>
	</div>	
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">	
		<a> <img scr="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" > Tarde </a>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<a><img scr="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"> Excusa </a>
		
	</div>
</div>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
{!!Form::open(array('url'=>'asistencia_servicio_social','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>No.</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Estado Asistencia</th>
					<th>Opciones</th>

				</thead>
               @foreach ($asistencia_servicio_socials as $key => $asistencia_servicio_social)
				<tr>
					<td>{{ $key +1 }}</td>
					<td>{{ $asistencia_servicio_social->Nombres }}</td>
					<td>{{ $asistencia_servicio_social->Apellidos }}</td>
					<td><input type="text" name="asistencia[]" value="{{ $asistencia_servicio_social->EstadoAsistencia }}"></td>
					<td><input type="image" name="botondeenvio" src="{{asset('img/PRESENTE.png')}}" height="20px" width="20px" alt="Presente">
					<input type="image" name="botondeenvio" src="{{asset('img/AUSENTE.png')}}" height="20px" width="20px" alt="Ausente">
					<input type="image" name="botondeenvio" src="{{asset('img/TARDE.png')}}" height="20px" width="20px" alt="Tarde">
					<input type="image" name="botondeenvio" src="{{asset('img/LICENCIA.png')}}" height="20px" width="20px" alt="Excusa"></td>
				</tr>
				
				@endforeach
			</table>
		</div>
		
  			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit">Guardar</button>
		            	<a href="{{URL::action('App\Http\Controllers\Asistencia_servicio_socialControlador@update',1)}}"><button class="btn btn-info">Guardar</button></a>
            		</div>
            	</div>	
        	</center>
				
		{{$asistencia_servicio_socials->render()}}
	</div>
</div>
{!!Form::close()!!}
@endsection