@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Jornada @can('create jornada')<a href="jornada/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('jornada.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Jornada</th>
					<th>Jornada</th>
					<th>Opciones</th>
				</thead>
               @foreach ($jornadas as $jornada)
				<tr>
					
					<td>{{ $jornada->idJornada}}</td>
					<td>{{ $jornada->Jornada}}</td>
					<td>
						@can('edit jornada')
						<a href="{{URL::action('App\Http\Controllers\JornadaControlador@edit',$jornada->idJornada)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete jornada')
                        <a href="" data-target="#modal-delete-{{$jornada->idJornada}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show jornada')
                        <a href="{{URL::action('App\Http\Controllers\JornadaControlador@show',$jornada->idJornada)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('jornada.modal')
				@endforeach
			</table>
		</div>
		{{$jornadas->render()}}
	</div>
</div>

@endsection