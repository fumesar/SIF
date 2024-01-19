@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estado Jefatura @can('create estado_jefatura')<a href="estado_jefatura/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('estado_jefatura.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th class="text text-center">Id Estado</th>
					<th class="text text-center">Estado</th>
					<th class="text text-center">Opciones</th>
				</thead>
               @foreach ($estado_jefaturas as $estado_jefatura)
				<tr>
					
					<td>{{ $estado_jefatura->idEstado}}</td>
					<td>{{ $estado_jefatura->Estado}}</td>
					<td>
						@can('edit estado_jefatura')
						<a href="{{URL::action('App\Http\Controllers\Estado_jefaturaControlador@edit',$estado_jefatura->idEstado)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete estado_jefatura')
                        <a href="" data-target="#modal-delete-{{$estado_jefatura->idEstado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                         @can('show estado_jefatura')
                        <a href="{{URL::action('App\Http\Controllers\Estado_jefaturaControlador@show',$estado_jefatura->idEstado)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('estado_jefatura.modal')
				@endforeach
			</table>
		</div>
		{{$estado_jefaturas->render()}}
	</div>
</div>

@endsection