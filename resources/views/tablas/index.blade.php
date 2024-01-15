@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tablas @can('create tablas')<a href="tablas/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('tablas.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Idtablas</th>
					<th>Nombre Tabla</th>
					<th>Tipo</th>
					<th>Opcion</th>
					<th>Grupo</th>
					<th>Orden</th>
					<th>Icono</th>
					<th>Icono Grupo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tablass as $tablas)
				<tr>
					
					<td>{{ $tablas->idtablas}}</td>
					<td>{{ $tablas->NombreTabla}}</td>
					<td>{{ $tablas->Tipo}}</td>
					<td>{{ $tablas->Opcion}}</td>
					<td>{{ $tablas->Grupo}}</td>
					<td>{{ $tablas->Orden}}</td>
					<td>{{ $tablas->Icono}}</td>
					<td>{{ $tablas->IconoGrupo}}</td>
					<td>
						@can('edit tablas')
						<a href="{{URL::action('App\Http\Controllers\TablasControlador@edit',$tablas->idtablas)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete tablas')
                        <a href="" data-target="#modal-delete-{{$tablas->idtablas}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show tablas')
                        <a href="{{URL::action('App\Http\Controllers\TablasControlador@show',$tablas->idtablas)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('tablas.modal')
				@endforeach
			</table>
		</div>
		{{$tablass->render()}}
	</div>
</div>

@endsection