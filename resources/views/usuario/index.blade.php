@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios @can('create usuarios')<a href="usuario/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Rol</th>
					<th>Colegio</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->id}}</td>
					<td>{{ $usuario->name}}</td>
					<td>{{ $usuario->email}}</td>
					<td>{{ $usuario->rol_name}}</td>
					<td>{{ $usuario->colegio}}</td>
					<td>
						@can('edit usuarios')
						<a href="{{URL::action('App\Http\Controllers\UsuarioController@edit',$usuario->id)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete usuarios')
                         <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
					</td>
				</tr>
				@include('usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection