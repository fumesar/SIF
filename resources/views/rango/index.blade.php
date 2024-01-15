@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Rango @can('create rango')<a href="rango/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('rango.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Rango</th>
					<th>Rango</th>
					<th>Opciones</th>
				</thead>
               @foreach ($rangos as $rango)
				<tr>
					
					<td>{{ $rango->idRango}}</td>
					<td>{{ $rango->Rango}}</td>
					<td>
						@can('edit rango')
						<a href="{{URL::action('App\Http\Controllers\RangoControlador@edit',$rango->idRango)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete rango')
                        <a href="" data-target="#modal-delete-{{$rango->idRango}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show rango')
                        <a href="{{URL::action('App\Http\Controllers\RangoControlador@show',$rango->idRango)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('rango.modal')
				@endforeach
			</table>
		</div>
		{{$rangos->render()}}
	</div>
</div>

@endsection