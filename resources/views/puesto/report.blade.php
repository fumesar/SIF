@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Puesto(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Puesto(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdPuesto</th>
					<th>Puesto</th>
				</thead>
               @foreach ($puestos as $puesto)
				<tr>
					
					<td>{{ $puesto->idPuesto}}</td>
					<td>{{ $puesto->Puesto}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$puestos->render()}}
	</div>
</div>

@endsection