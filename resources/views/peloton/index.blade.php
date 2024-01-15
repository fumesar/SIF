@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Peloton @can('create peloton')<a href="peloton/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('peloton.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Peloton</th>
					<th>Peloton</th>
					<th>Opciones</th>
				</thead>
               @foreach ($pelotons as $peloton)
				<tr>
					
					<td>{{ $peloton->idPeloton}}</td>
					<td>{{ $peloton->Peloton}}</td>
					<td>
						@can('edit peloton')
						<a href="{{URL::action('App\Http\Controllers\PelotonControlador@edit',$peloton->idPeloton)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete peloton')
                        <a href="" data-target="#modal-delete-{{$peloton->idPeloton}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show peloton')
                        <a href="{{URL::action('App\Http\Controllers\PelotonControlador@show',$peloton->idPeloton)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('peloton.modal')
				@endforeach
			</table>
		</div>
		{{$pelotons->render()}}
	</div>
</div>

@endsection