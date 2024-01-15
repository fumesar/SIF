@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Estado_asistencia: {{ $estado_asistencia->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($estado_asistencia,['method'=>'GET','route'=>['estado_asistencia.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="EstadoAsistencia">Estado Asistencia(*)</label>
	            	<input type="text" name="EstadoAsistencia" class="form-control" value="{{$estado_asistencia->EstadoAsistencia}}" placeholder="Estado Asistencia(*)..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\Estado_asistenciaControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection