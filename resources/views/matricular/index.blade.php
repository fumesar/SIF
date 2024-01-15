@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Matricular @can('create matricular')<a href="matricular/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('matricular.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Matricula</th>
					<th>Semestre</th>
					<th>Documento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Curso</th>
					<th>Estado Matricula</th>
					<th>Opciones</th>
				</thead>
               @foreach ($matriculars as $matricular)
				<tr>
					
					<td>{{ $matricular->idMatricula}}</td>
					<td>{{ $matricular->semestre}}</td>
					<td>{{ $matricular->Documento}}</td>
					<td>{{ $matricular->Nombres}}</td>
					<td>{{ $matricular->Apellidos}}</td>
					<td>{{ $matricular->curso}}</td>
					<td>{{ $matricular->estado_matricula}}</td>
					<td>
						@can('edit matricular')
						<a href="{{URL::action('App\Http\Controllers\MatricularControlador@edit',$matricular->idMatricula)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete matricular')
                        <a href="" data-target="#modal-delete-{{$matricular->idMatricula}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show matricular')
                        <a href="{{URL::action('App\Http\Controllers\MatricularControlador@show',$matricular->idMatricula)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('matricular.modal')
				@endforeach
			</table>
		</div>
		{{ $matriculars->appends(["searchText"=>$searchText])->links() }}
	</div>
</div>

@endsection