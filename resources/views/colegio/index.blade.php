@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Colegio @can('create colegio')<a href="colegio/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('colegio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Colegio</th>
					<th>Colegio</th>
					<th>Opciones</th>
				</thead>
               @foreach ($colegios as $colegio)
				<tr>
					
					<td>{{ $colegio->idColegio}}</td>
					<td>{{ $colegio->Colegio}}</td>
					<td>
						@can('edit colegio')
						<a href="{{URL::action('App\Http\Controllers\ColegioControlador@edit',$colegio->idColegio)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete colegio')
                        <a href="" data-target="#modal-delete-{{$colegio->idColegio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show colegio')
                        <a href="{{URL::action('App\Http\Controllers\ColegioControlador@show',$colegio->idColegio)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('colegio.modal')
				@endforeach
			</table>
		</div>
		{{$colegios->render()}}
	</div>
</div>

@endsection