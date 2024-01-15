@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Falta @can('create falta')<a href="falta/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('falta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Idfalta</th>
					<th>Falta</th>
					<th>Opciones</th>
				</thead>
               @foreach ($faltas as $falta)
				<tr>
					
					<td>{{ $falta->idfalta}}</td>
					<td>{{ $falta->Falta}}</td>
					<td>
						@can('edit falta')
						<a href="{{URL::action('App\Http\Controllers\FaltaControlador@edit',$falta->idfalta)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete falta')
                        <a href="" data-target="#modal-delete-{{$falta->idfalta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show falta')
                        <a href="{{URL::action('App\Http\Controllers\FaltaControlador@show',$falta->idfalta)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('falta.modal')
				@endforeach
			</table>
		</div>
		{{$faltas->render()}}
	</div>
</div>

@endsection