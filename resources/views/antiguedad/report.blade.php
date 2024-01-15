@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Antiguedad(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Antiguedad(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Idantiguedad</th>
					<th>Rango</th>
					<th>Anos</th>
					<th>Rango</th>
				</thead>
               @foreach ($antiguedads as $antiguedad)
				<tr>
					
					<td>{{ $antiguedad->idantiguedad}}</td>
					<td>{{ $antiguedad->rango}}</td>
					<td>{{ $antiguedad->anos}}</td>
					<td>{{ $antiguedad->rango}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$antiguedads->render()}}
	</div>
</div>

@endsection