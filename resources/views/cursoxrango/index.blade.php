@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cursoxrango @can('create cursoxrango')<a href="cursoxrango/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('cursoxrango.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Cursox Rango</th>
					<th>Rango</th>
					<th>Curso</th>
					<th>Opciones</th>
				</thead>
               @foreach ($cursoxrangos as $cursoxrango)
				<tr>
					
					<td>{{ $cursoxrango->idCursoxRango}}</td>
					<td>{{ $cursoxrango->rango}}</td>
					<td>{{ $cursoxrango->curso}}</td>
					<td>
						@can('edit cursoxrango')
						<a href="{{URL::action('App\Http\Controllers\CursoxrangoControlador@edit',$cursoxrango->idCursoxRango)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete cursoxrango')
                        <a href="" data-target="#modal-delete-{{$cursoxrango->idCursoxRango}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show cursoxrango')
                        <a href="{{URL::action('App\Http\Controllers\CursoxrangoControlador@show',$cursoxrango->idCursoxRango)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('cursoxrango.modal')
				@endforeach
			</table>
		</div>
		{{$cursoxrangos->render()}}
	</div>
</div>

@endsection