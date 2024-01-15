@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cargo @can('create cargo')<a href="cargo/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('cargo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Cargo</th>
					<th>Cargo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($cargos as $cargo)
				<tr>
					
					<td>{{ $cargo->idCargo}}</td>
					<td>{{ $cargo->Cargo}}</td>
					<td>
						@can('edit cargo')
						<a href="{{URL::action('App\Http\Controllers\CargoControlador@edit',$cargo->idCargo)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete cargo')
                        <a href="" data-target="#modal-delete-{{$cargo->idCargo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show cargo')
                        <a href="{{URL::action('App\Http\Controllers\CargoControlador@show',$cargo->idCargo)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('cargo.modal')
				@endforeach
			</table>
		</div>
		{{$cargos->render()}}
	</div>
</div>

@endsection