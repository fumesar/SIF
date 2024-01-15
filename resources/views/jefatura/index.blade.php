@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Jefatura @can('create jefatura')<a href="jefatura/create"><button class="btn btn-success">Nuevo</button></a>@endcan</h3>
		@include('jefatura.search2')
	</div>
</div>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th class="text text-center">Rango</th>
					<th class="text text-center">Nombres</th>
					<th class="text text-center">Apellidos</th>
					<th class="text text-center">Opciones</th>
				</thead>
               @foreach ($jefaturas as $jefatura)
				<tr>
					
					<td>{{ $jefatura->rango}}</td>
					<td>{{ $jefatura->Nombres}}</td>
					<td>{{ $jefatura->Apellidos}}</td>
					<td>
						@can('edit jefatura')
						<a href="{{URL::action('App\Http\Controllers\JefaturaControlador@edit',$jefatura->idJefatura)}}"><button class="btn btn-info">Editar</button></a>
						@endcan
                        @can('delete jefatura')
                        <a href="" data-target="#modal-delete-{{$jefatura->idJefatura}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        @endcan
                        @can('show jefatura')
                        <a href="{{URL::action('App\Http\Controllers\JefaturaControlador@show',$jefatura->idJefatura)}}"><button class="btn btn-success">Ver</button></a>
                        @endcan
                        @can('edit jefatura')
                        <a href="{{URL::action('App\Http\Controllers\JefaturaControlador@ascender',$jefatura->idJefatura)}}"><button class="btn btn-success">Ascender</button></a>
                        @endcan
					</td>
				</tr>
				@include('jefatura.modal')
				@endforeach
			</table>
		</div>
		{{ $jefaturas->appends(["searchText"=>$searchText])->links() }}
	</div>
</div>

@endsection