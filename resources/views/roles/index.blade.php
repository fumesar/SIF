@extends ('layouts.admin')
@section ('contenido')
@toastr_css
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Roles @can('create roles')<a href="roles/create"></a>@endcan</h3>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">	
		@include('roles.create')
		@include('roles.search')

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif
	</div>
    
    <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
		<div class="text-right">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_Roles_Create">{{__('Nuevo')}}</button>
		</div>
	</div>
                            
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover table-responsive-sm">
				<thead>
					
					<th>Rol</th>
					<th>Aplicación</th>
					<th>Created At</th>
					<th>Updated At</th>
					<th class="text-center">{{__('Opciones')}}</th>
				</thead>
                @foreach ($roles as $role)
					<tr>
						
						<td>{{$role->name}}</td>
						<td>{{$role->guard_name}}</td>
						<td>{{$role->created_at}}</td>
						<td>{{$role->updated_at}}</td>
						<td class="d-flex justify-content-center">
							@can('edit roles')
                            <a href="" data-target="#modal-edit-{{$role->id}}" data-toggle="modal" title="Editar datos de este registro"><button class="btn btn-info btn-sm">{{__('Editar')}}</button></a>
                            @endcan
                        	@can('delete roles')
                            <a href="" data-target="#modal-delete-{{$role->id}}" data-toggle="modal" title="Eliminar este registro"><button class="btn btn-danger btn-sm">{{__('Eliminar')}}</button></a>
                            @endcan
                        	@can('show roles')
                            <a href="" data-target="#modal-ver-{{$role->id}}" data-toggle="modal" title="Ver datos de este registro"><button class="btn btn-success btn-sm">{{__('Ver')}}</button></a>
                            @endcan
						</td>
					</tr>
					@include('roles.modal')
					@include('roles.edit')
					@include('roles.show')
				@endforeach
			</table>
		</div>
		{{$roles->render()}}
	</div>
</div>
@jquery 
@toastr_js
@toastr_render
@endsection