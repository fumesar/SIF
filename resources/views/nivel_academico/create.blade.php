@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Nivel_academico</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'nivel_academico','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="NivelAcademico">Nivel Academico(*)</label>
                  	<input type="text" name="NivelAcademico" class="form-control" placeholder="NivelAcademico...">
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