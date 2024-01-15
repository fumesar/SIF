@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Departamento_nacimiento @can('create departamento_nacimiento')<a href="departamento_nacimiento/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('departamento_nacimiento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Departamento Nacimiento</th>
					<th>Departamento Nacimiento</th>
					<th>Opciones</th>
				</thead>
               @foreach ($departamento_nacimientos as $departamento_nacimiento)
				<tr>
					
					<td>{{ $departamento_nacimiento->idDepartamentoNacimiento}}</td>
					<td>{{ $departamento_nacimiento->DepartamentoNacimiento}}</td>
					<td>
						@can('edit departamento_nacimiento')
						<a href="{{URL::action('App\Http\Controllers\Departamento_nacimientoControlador@edit',$departamento_nacimiento->idDepartamentoNacimiento)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete departamento_nacimiento')
                        <a href="" data-target="#modal-delete-{{$departamento_nacimiento->idDepartamentoNacimiento}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show departamento_nacimiento')
                        <a href="{{URL::action('App\Http\Controllers\Departamento_nacimientoControlador@show',$departamento_nacimiento->idDepartamentoNacimiento)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('departamento_nacimiento.modal')
				@endforeach
			</table>
		</div>
		{{$departamento_nacimientos->render()}}
	</div>
</div>

@endsection