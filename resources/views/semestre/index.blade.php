@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Semestre @can('create semestre')<a href="semestre/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('semestre.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Semestre</th>
					<th>Semestre</th>
					<th>Fecha Inicio</th>
					<th>Fecha Final</th>
					<th>Opciones</th>
				</thead>
               @foreach ($semestres as $semestre)
				<tr>
					
					<td>{{ $semestre->idSemestre}}</td>
					<td>{{ $semestre->Semestre}}</td>
					<td>{{ $semestre->FechaInicio}}</td>
					<td>{{ $semestre->FechaFinal}}</td>
					<td>
						@can('edit semestre')
						<a href="{{URL::action('App\Http\Controllers\SemestreControlador@edit',$semestre->idSemestre)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete semestre')
                        <a href="" data-target="#modal-delete-{{$semestre->idSemestre}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show semestre')
                        <a href="{{URL::action('App\Http\Controllers\SemestreControlador@show',$semestre->idSemestre)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('semestre.modal')
				@endforeach
			</table>
		</div>
		{{$semestres->render()}}
	</div>
</div>

@endsection