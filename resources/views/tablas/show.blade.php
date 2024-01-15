@extends ('layouts.admin')
@section ('contenido')
   
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Tablas: {{ $tablas->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tablas,['method'=>'GET','route'=>['tablas.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NombreTabla">Nombre Tabla(*)</label>
	            	<input type="text" name="NombreTabla" class="form-control" value="{{$tablas->NombreTabla}}" placeholder="Nombre Tabla(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Tipo">Tipo</label>
	            	<input type="text" name="Tipo" class="form-control" value="{{$tablas->Tipo}}" placeholder="Tipo..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Opcion">Opcion</label>
	            	<input type="text" name="Opcion" class="form-control" value="{{$tablas->Opcion}}" placeholder="Opcion..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Grupo">Grupo</label>
	            	<input type="text" name="Grupo" class="form-control" value="{{$tablas->Grupo}}" placeholder="Grupo..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Orden">Orden</label>
	            	<input type="text" name="Orden" class="form-control" value="{{$tablas->Orden}}" placeholder="Orden..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Icono">Icono</label>
	            	<input type="text" name="Icono" class="form-control" value="{{$tablas->Icono}}" placeholder="Icono..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="IconoGrupo">Icono Grupo</label>
	            	<input type="text" name="IconoGrupo" class="form-control" value="{{$tablas->IconoGrupo}}" placeholder="Icono Grupo..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\TablasControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
            
		</div>
	</div>
	
@endsection