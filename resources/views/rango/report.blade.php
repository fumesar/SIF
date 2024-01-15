@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Rango(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Rango(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdRango</th>
					<th>Rango</th>
				</thead>
               @foreach ($rangos as $rango)
				<tr>
					
					<td>{{ $rango->idRango}}</td>
					<td>{{ $rango->Rango}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$rangos->render()}}
	</div>
</div>

@endsection