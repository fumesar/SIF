@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte De Jefatura</h3>
	</div>
</div>
@include('jefatura.search')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Jefatura(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th class="text text-center">No.</th>
					<th class="text text-center">Rango</th>
					<th class="text text-center">Nombres</th>
					<th class="text text-center">Apellidos</th>
					<th class="text text-center">Seccional</th>
					<th class="text text-center">Brigada</th>
				</thead>
               @foreach ($jefaturas as $key=> $jefatura)
				<tr>
					<td class="text-center">{{ $key+1}}</td>
					<td>{{ $jefatura->rango}}</td>
					<td>{{ $jefatura->Nombres}}</td>
					<td>{{ $jefatura->Apellidos}}</td>
					<td class="text-center">{{ $jefatura->seccional}}</td>
					<td class="text-center">{{ $jefatura->brigada}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	
	</div>
</div>

@endsection