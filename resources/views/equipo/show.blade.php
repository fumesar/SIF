@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Detalles De Equipo: {{ $equipo->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($equipo,['method'=>'GET','route'=>['equipo.index']])!!}
            {{Form::token()}}
			
			

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NombreEquipo">Nombre Equipo(*)</label>
	            	<input type="text" name="NombreEquipo" class="form-control" value="{{$equipo->NombreEquipo}}" placeholder="Nombre Equipo(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Referencia">Referencia</label>
	            	<input type="text" name="Referencia" class="form-control" value="{{$equipo->Referencia}}" placeholder="Referencia..." disabled>
	            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="Cantidad">Cantidad(*)</label>
                    <input type="number" name="Cantidad" class="form-control" value="{{$equipo->Cantidad}}" placeholder="Cantidad..." disabled>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NroEstante">Nro Estante</label>
	            	<input type="text" name="NroEstante" class="form-control" value="{{$equipo->NroEstante}}" placeholder="Nro Estante..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\EquipoControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
            
			{!!Form::close()!!}		
		</div>
	</div>
	
@endsection