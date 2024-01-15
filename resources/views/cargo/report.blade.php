@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Cargo(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Cargo(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdCargo</th>
					<th>Cargo</th>
				</thead>
               @foreach ($cargos as $cargo)
				<tr>
					
					<td>{{ $cargo->idCargo}}</td>
					<td>{{ $cargo->Cargo}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$cargos->render()}}
	</div>
</div>

@endsection