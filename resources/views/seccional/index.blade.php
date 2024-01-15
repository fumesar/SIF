@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Seccional @can('create seccional')<a href="seccional/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('seccional.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Seccional</th>
					<th>Seccional</th>
					<th>Opciones</th>
				</thead>
               @foreach ($seccionals as $seccional)
				<tr>
					
					<td>{{ $seccional->idSeccional}}</td>
					<td>{{ $seccional->Seccional}}</td>
					<td>
						@can('edit seccional')
						<a href="{{URL::action('App\Http\Controllers\SeccionalControlador@edit',$seccional->idSeccional)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete seccional')
                        <a href="" data-target="#modal-delete-{{$seccional->idSeccional}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show seccional')
                        <a href="{{URL::action('App\Http\Controllers\SeccionalControlador@show',$seccional->idSeccional)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('seccional.modal')
				@endforeach
			</table>
		</div>
		{{$seccionals->render()}}
	</div>
</div>

@endsection