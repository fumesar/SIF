@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Users <a href="users/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('users.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>Remember Token</th>
					<th>Created At</th>
					<th>Updated At</th>
					<th>Opciones</th>
				</thead>
               @foreach ($userss as $users)
				<tr>
					
					<td>{{ $users->id}}</td>
					<td>{{ $users->name}}</td>
					<td>{{ $users->email}}</td>
					<td>{{ $users->password}}</td>
					<td>{{ $users->remember_token}}</td>
					<td>{{ $users->created_at}}</td>
					<td>{{ $users->updated_at}}</td>
					<td>
						<a href="{{URL::action('App\Http\Controllers\UsersControlador@edit',$users->id)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$users->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        <a href="{{URL::action('App\Http\Controllers\UsersControlador@show',$users->id)}}"><button class="btn btn-success">Ver</button></a>
					</td>
				</tr>
				@include('users.modal')
				@endforeach
			</table>
		</div>
		{{$userss->render()}}
	</div>
</div>

@endsection