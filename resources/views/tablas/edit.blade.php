@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tablas: {{ $tablas->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tablas,['method'=>'PATCH','route'=>['tablas.update',$tablas->idtablas]])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NombreTabla">Nombre Tabla(*)</label>
	            	<input type="text" name="NombreTabla" class="form-control" value="{{$tablas->NombreTabla}}" placeholder="Nombre Tabla(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Tipo">Tipo</label>
	            	<input type="text" name="Tipo" class="form-control" value="{{$tablas->Tipo}}" placeholder="Tipo...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Opcion">Opcion</label>
	            	<input type="text" name="Opcion" class="form-control" value="{{$tablas->Opcion}}" placeholder="Opcion...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Grupo">Grupo</label>
	            	<input type="text" name="Grupo" class="form-control" value="{{$tablas->Grupo}}" placeholder="Grupo...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Orden">Orden</label>
	            	<input type="text" name="Orden" class="form-control" value="{{$tablas->Orden}}" placeholder="Orden...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Icono">Icono</label>
	            	<input type="text" name="Icono" class="form-control" value="{{$tablas->Icono}}" placeholder="Icono...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="IconoGrupo">Icono Grupo</label>
	            	<input type="text" name="IconoGrupo" class="form-control" value="{{$tablas->IconoGrupo}}" placeholder="Icono Grupo...">
	            </div>
            </div>

			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit">Guardar</button>
		            	<button class="btn btn-danger" type="reset">Cancelar</button>
            		</div>
            	</div>	
        	</center>
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection