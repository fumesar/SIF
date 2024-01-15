@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Tablas</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'tablas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="NombreTabla">Nombre Tabla(*)</label>
                  	<input type="text" name="NombreTabla" class="form-control" placeholder="NombreTabla...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Tipo">Tipo</label>
                  	<input type="text" name="Tipo" class="form-control" placeholder="Tipo...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Opcion">Opcion</label>
                  	<input type="text" name="Opcion" class="form-control" placeholder="Opcion...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Grupo">Grupo</label>
                  	<input type="text" name="Grupo" class="form-control" placeholder="Grupo...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Orden">Orden</label>
                  	<input type="text" name="Orden" class="form-control" placeholder="Orden...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Icono">Icono</label>
                  	<input type="text" name="Icono" class="form-control" placeholder="Icono...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="IconoGrupo">Icono Grupo</label>
                  	<input type="text" name="IconoGrupo" class="form-control" placeholder="IconoGrupo...">
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