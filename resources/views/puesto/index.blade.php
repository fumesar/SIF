@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Puesto @can('create puesto')<a href="puesto/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('puesto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Puesto</th>
					<th>Puesto</th>
					<th>Opciones</th>
				</thead>
               @foreach ($puestos as $puesto)
				<tr>
					
					<td>{{ $puesto->idPuesto}}</td>
					<td>{{ $puesto->Puesto}}</td>
					<td>
						@can('edit puesto')
						<a href="{{URL::action('App\Http\Controllers\PuestoControlador@edit',$puesto->idPuesto)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete puesto')
                        <a href="" data-target="#modal-delete-{{$puesto->idPuesto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show puesto')
                        <a href="{{URL::action('App\Http\Controllers\PuestoControlador@show',$puesto->idPuesto)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('puesto.modal')
				@endforeach
			</table>
		</div>
		{{$puestos->render()}}
	</div>
</div>

@endsection