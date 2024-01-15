@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Localidad(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Localidad(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdLocalidad</th>
					<th>Localidad</th>
				</thead>
               @foreach ($localidads as $localidad)
				<tr>
					
					<td>{{ $localidad->idLocalidad}}</td>
					<td>{{ $localidad->Localidad}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$localidads->render()}}
	</div>
</div>

@endsection