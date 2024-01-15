@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Rh @can('create rh')<a href="rh/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('rh.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id R H</th>
					<th>R H</th>
					<th>Opciones</th>
				</thead>
               @foreach ($rhs as $rh)
				<tr>
					
					<td>{{ $rh->idRH}}</td>
					<td>{{ $rh->RH}}</td>
					<td>
						@can('edit rh')
						<a href="{{URL::action('App\Http\Controllers\RhControlador@edit',$rh->idRH)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete rh')
                        <a href="" data-target="#modal-delete-{{$rh->idRH}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show rh')
                        <a href="{{URL::action('App\Http\Controllers\RhControlador@show',$rh->idRH)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('rh.modal')
				@endforeach
			</table>
		</div>
		{{$rhs->render()}}
	</div>
</div>

@endsection