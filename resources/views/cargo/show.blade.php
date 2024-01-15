@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Cargo: {{ $cargo->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cargo,['method'=>'GET','route'=>['cargo.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Cargo">Cargo(*)</label>
	            	<input type="text" name="Cargo" class="form-control" value="{{$cargo->Cargo}}" placeholder="Cargo(*)..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\CargoControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection