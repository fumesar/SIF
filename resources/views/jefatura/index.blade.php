@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Jefatura @can('create jefatura')<a href="jefatura/create"><img src="{{asset('img/NUEVO.png')}}" type="image/png" height="40px" width="40px" style="margin-left: 10px;"></a>@endcan</h3>
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
					<td class="text-center">
						@can('edit jefatura')
						<a href="{{URL::action('App\Http\Controllers\JefaturaControlador@edit',$jefatura->idJefatura)}}"><img src="{{asset('img/EDITAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
						@endcan
                        @can('delete jefatura')
                        <a href="" data-target="#modal-delete-{{$jefatura->idJefatura}}" data-toggle="modal"><img src="{{asset('img/ELIMINAR.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
                        @endcan
                        @can('show jefatura')
                        <a href="{{URL::action('App\Http\Controllers\JefaturaControlador@show',$jefatura->idJefatura)}}"><img src="{{asset('img/VER.png')}}" type="image/png" height="30px" width="30px" style="margin-right: 5px;">
                        @endcan
                        @can('edit jefatura')
                        <a href="{{URL::action('App\Http\Controllers\JefaturaControlador@ascender',$jefatura->idJefatura)}}"><img src="{{asset('img/ASCENDER.png')}}" type="image/png" height="30px" width="30px" >
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