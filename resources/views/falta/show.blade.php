@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Falta: {{ $falta->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($falta,['method'=>'GET','route'=>['falta.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Falta">Falta(*)</label>
	            	<input type="text" name="Falta" class="form-control" value="{{$falta->Falta}}" placeholder="Falta(*)..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\FaltaControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>

@endsection