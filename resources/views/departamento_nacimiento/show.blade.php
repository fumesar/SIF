@extends ('layouts.admin')
@section ('contenido')
   
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Departamento_nacimiento: {{ $departamento_nacimiento->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($departamento_nacimiento,['method'=>'GET','route'=>['departamento_nacimiento.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="DepartamentoNacimiento">Departamento Nacimiento(*)</label>
	            	<input type="text" name="DepartamentoNacimiento" class="form-control" value="{{$departamento_nacimiento->DepartamentoNacimiento}}" placeholder="Departamento Nacimiento(*)..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\Departamento_nacimientoControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
            
		</div>
	</div>
	
@endsection