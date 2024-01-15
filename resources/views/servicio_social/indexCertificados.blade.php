@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Descarga/Impresión de Certificados de Servicio Social</h3>
		@include('servicio_social.search_descarga_certificados')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th class="text text-center">Tipo Documento</th>
					<th class="text text-center">Numero Documento</th>
					<th class="text text-center">Nombres</th>
					<th class="text text-center">Apellidos</th>
					<th class="text text-center">Opciones</th>
				</thead>
               @foreach ($servicio_socials as $servicio_social)
				<tr>
					
					<td>{{ $servicio_social->tipo_documento}}</td>
					<td>{{ $servicio_social->NumeroDocumento}}</td>
					<td>{{ $servicio_social->Nombres}}</td>
					<td>{{ $servicio_social->Apellidos }}</td>
					<td class="text text-center">
						@if($servicio_social->conteoAsistencias>=16)
							@role('Administrador')
								<a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@certificado',$servicio_social->idServicioSocial)}}"><button class="btn btn-success">Certificado</button></a>
								@if( $servicio_social->habilitarDescarga == true )
				            		<!-- <a href="#"><button class="btn btn-info">Habilitar Certificado</button></a> -->
				            		<a href="" data-target="#modal-habilitar-{{$servicio_social->idServicioSocial}}" data-toggle="modal"><button class="btn btn-info">Habilitar Certificado</button></a>
				            	@endif
							@endrole
							@role('Colegios')
								@if( !($servicio_social->habilitarDescarga == true) )
									<a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@certificado',$servicio_social->idServicioSocial)}}"><button class="btn btn-success">Certificado</button></a>
								@endif
							@endrole
							
						@else
		            		<a href="#"><button class="btn btn-danger">Sin Certificado</button></a>
		            	@endif

					</td>
				</tr>
				@include('servicio_social.habilitar')
				@endforeach
			</table>
		</div>
		{{ $servicio_socials->appends(["searchText"=>$searchText])->links() }}
	</div>
</div>

@endsection