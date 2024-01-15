@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Departamento_residencia @can('create departamento_residencia')<a href="departamento_residencia/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('departamento_residencia.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Departamento Residencia</th>
					<th>Departamento Residencia</th>
					<th>Opciones</th>
				</thead>
               @foreach ($departamento_residencias as $departamento_residencia)
				<tr>
					<td>{{ $departamento_residencia->idDepartamentoResidencia}}</td>
					<td>{{ $departamento_residencia->DepartamentoResidencia}}</td>
					<td>
						@can('edit departamento_residencia')
						<a href="{{URL::action('App\Http\Controllers\Departamento_residenciaControlador@edit',$departamento_residencia->idDepartamentoResidencia)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete departamento_residencia')
                        <a href="" data-target="#modal-delete-{{$departamento_residencia->idDepartamentoResidencia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show departamento_residencia')
                        <a href="{{URL::action('App\Http\Controllers\Departamento_residenciaControlador@show',$departamento_residencia->idDepartamentoResidencia)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('departamento_residencia.modal')
				@endforeach
			</table>
		</div>
		{{$departamento_residencias->render()}}
	</div>
</div>

@endsection