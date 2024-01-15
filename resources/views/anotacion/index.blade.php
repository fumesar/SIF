@extends ('layouts.admin')
@section ('contenido')
@toastr_css
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Anotacion @can('create anotacion')<a href="anotacion/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Tipo Anotacion</th>
					<th>Fecha</th>
					<th>Falta</th>
					<th>Opciones</th>
				</thead>
               @foreach ($anotacions as $anotacion)
				<tr>
					
					<td>{{ $anotacion->Nombres}}</td>
					<td>{{ $anotacion->Apellidos}}</td>
					<td>{{ $anotacion->tipo_anotacion}}</td>
					<td>{{ $anotacion->Fecha}}</td>
					<td>{{ $anotacion->falta}}</td>
					<td>
						@can('edit anotacion')
						<a href="{{URL::action('App\Http\Controllers\AnotacionControlador@edit',$anotacion->idAnotacion)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete anotacion')
                        <a href="" data-target="#modal-delete-{{$anotacion->idAnotacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show anotacion')
                        <a href="{{URL::action('App\Http\Controllers\AnotacionControlador@show',$anotacion->idAnotacion)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('anotacion.modal')
				@endforeach
			</table>
		</div>
		{{$anotacions->render()}}
	</div>
</div>
@jquery 
@toastr_js
@toastr_render
@endsection