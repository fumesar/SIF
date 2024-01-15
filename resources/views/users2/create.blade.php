@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Users</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'users','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="name">Name(*)</label>
                  	<input type="text" name="name" class="form-control" placeholder="name...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="email">Email(*)</label>
                  	<input type="text" name="email" class="form-control" placeholder="email...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="password">Password(*)</label>
                  	<input type="text" name="password" class="form-control" placeholder="password...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="remember_token">Remember Token</label>
                  	<input type="text" name="remember_token" class="form-control" placeholder="remember_token...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="created_at">Created At</label>
                  	<input type="datetime-local" name="created_at" class="form-control" placeholder="created_at...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="updated_at">Updated At</label>
                  	<input type="datetime-local" name="updated_at" class="form-control" placeholder="updated_at...">
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