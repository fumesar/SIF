@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Nivel_academico @can('create nivel_academico')<a href="nivel_academico/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('nivel_academico.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id Nivel Academico</th>
					<th>Nivel Academico</th>
					<th>Opciones</th>
				</thead>
               @foreach ($nivel_academicos as $nivel_academico)
				<tr>
					
					<td>{{ $nivel_academico->idNivelAcademico}}</td>
					<td>{{ $nivel_academico->NivelAcademico}}</td>
					<td>
						@can('edit nivel_academico')
						<a href="{{URL::action('App\Http\Controllers\Nivel_academicoControlador@edit',$nivel_academico->idNivelAcademico)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete nivel_academico')
                        <a href="" data-target="#modal-delete-{{$nivel_academico->idNivelAcademico}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show nivel_academico')
                        <a href="{{URL::action('App\Http\Controllers\Nivel_academicoControlador@show',$nivel_academico->idNivelAcademico)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
					</td>
				</tr>
				@include('nivel_academico.modal')
				@endforeach
			</table>
		</div>
		{{$nivel_academicos->render()}}
	</div>
</div>

@endsection