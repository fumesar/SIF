@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Brigada @can('create brigada')<a href="brigada/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('brigada.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Brigada</th>
					<th>Brigada</th>
					<th>Opciones</th>
				</thead>
               @foreach ($brigadas as $brigada)
				<tr>
					
					<td>{{ $brigada->idBrigada}}</td>
					<td>{{ $brigada->Brigada}}</td>
					<td>
						@can('edit brigada')
						<a href="{{URL::action('App\Http\Controllers\BrigadaControlador@edit',$brigada->idBrigada)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete brigada')
                        <a href="" data-target="#modal-delete-{{$brigada->idBrigada}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show brigada')
                        <a href="{{URL::action('App\Http\Controllers\BrigadaControlador@show',$brigada->idBrigada)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('brigada.modal')
				@endforeach
			</table>
		</div>
		{{$brigadas->render()}}
	</div>
</div>

@endsection