@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Equipo: {{ $equipo->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($equipo,['method'=>'PATCH','route'=>['equipo.update',$equipo->idEquipo]])!!}
            {{Form::token()}}
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NombreEquipo">Nombre Equipo(*)</label>
	            	<input type="text" name="NombreEquipo" class="form-control" value="{{old('NombreEquipo',$equipo->NombreEquipo)}}" placeholder="Nombre Equipo(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Referencia">Referencia</label>
	            	<input type="text" name="Referencia" class="form-control" value="{{old('Referencia',$equipo->Referencia)}}" placeholder="Referencia...">
	            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="Cantidad">Cantidad(*)</label>
                    <input type="number" name="Cantidad" class="form-control" value="{{old('Cantidad',$equipo->Cantidad)}}" placeholder="Cantidad...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NroEstante">Nro Estante</label>
	            	<input type="text" name="NroEstante" class="form-control" value="{{old('NroEstante',$equipo->NroEstante)}}" placeholder="Nro Estante...">
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