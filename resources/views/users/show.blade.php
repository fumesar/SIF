@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Users: {{ $users->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($users,['method'=>'GET','route'=>['users.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="name">Name(*)</label>
	            	<input type="text" name="name" class="form-control" value="{{$users->name}}" placeholder="Name(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="email">Email(*)</label>
	            	<input type="text" name="email" class="form-control" value="{{$users->email}}" placeholder="Email(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="password">Password(*)</label>
	            	<input type="text" name="password" class="form-control" value="{{$users->password}}" placeholder="Password(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="remember_token">Remember Token</label>
	            	<input type="text" name="remember_token" class="form-control" value="{{$users->remember_token}}" placeholder="Remember Token..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="created_at">Created At</label>
	            	<input type="datetime-local" name="created_at" class="form-control" value="{{$users->created_at}}" placeholder="Created At..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="updated_at">Updated At</label>
	            	<input type="datetime-local" name="updated_at" class="form-control" value="{{$users->updated_at}}" placeholder="Updated At...">
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\UserControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection