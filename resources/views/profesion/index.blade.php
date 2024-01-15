@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Profesion @can('create profesion')<a href="profesion/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('profesion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Profesion</th>
					<th>Profesion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($profesions as $profesion)
				<tr>
					
					<td>{{ $profesion->idProfesion}}</td>
					<td>{{ $profesion->Profesion}}</td>
					<td>
						@can('edit profesion')
						<a href="{{URL::action('App\Http\Controllers\ProfesionControlador@edit',$profesion->idProfesion)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete profesion')
                        <a href="" data-target="#modal-delete-{{$profesion->idProfesion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show profesion')
                        <a href="{{URL::action('App\Http\Controllers\ProfesionControlador@show',$profesion->idProfesion)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('profesion.modal')
				@endforeach
			</table>
		</div>
		{{$profesions->render()}}
	</div>
</div>

@endsection