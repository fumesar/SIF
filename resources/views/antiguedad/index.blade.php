@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Antiguedad @can('create asignatura')<a href="antiguedad/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('antiguedad.search')
	</div>
</div>
@endcan
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Idantiguedad</th>
					<th>Rango</th>
					<th>Anos</th>
					<th>Rango</th>
					<th>Opciones</th>
				</thead>
               @foreach ($antiguedads as $antiguedad)
				<tr>
					
					<td>{{ $antiguedad->idantiguedad}}</td>
					<td>{{ $antiguedad->rango}}</td>
					<td>{{ $antiguedad->anos}}</td>
					<td>{{ $antiguedad->rango}}</td>
					<td>
						@can('edit antiguedad')
						<a href="{{URL::action('App\Http\Controllers\AntiguedadControlador@edit',$antiguedad->idantiguedad)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete antiguedad')
                        <a href="" data-target="#modal-delete-{{$antiguedad->idantiguedad}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show antiguedad')
                        <a href="{{URL::action('App\Http\Controllers\AntiguedadControlador@show',$antiguedad->idantiguedad)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('antiguedad.modal')
				@endforeach
			</table>
		</div>
		{{$antiguedads->render()}}
	</div>
</div>

@endsection