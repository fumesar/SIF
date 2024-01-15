@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Tablas(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Tablas(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Idtablas</th>
					<th>NombreTabla</th>
					<th>Tipo</th>
					<th>Opcion</th>
					<th>Grupo</th>
					<th>Orden</th>
					<th>Icono</th>
					<th>IconoGrupo</th>
				</thead>
               @foreach ($tablass as $tablas)
				<tr>
					
					<td>{{ $tablas->idtablas}}</td>
					<td>{{ $tablas->NombreTabla}}</td>
					<td>{{ $tablas->Tipo}}</td>
					<td>{{ $tablas->Opcion}}</td>
					<td>{{ $tablas->Grupo}}</td>
					<td>{{ $tablas->Orden}}</td>
					<td>{{ $tablas->Icono}}</td>
					<td>{{ $tablas->IconoGrupo}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$tablass->render()}}
	</div>
</div>

@endsection