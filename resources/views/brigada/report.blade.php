@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Brigada(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Brigada(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdBrigada</th>
					<th>Brigada</th>
				</thead>
               @foreach ($brigadas as $brigada)
				<tr>
					
					<td>{{ $brigada->idBrigada}}</td>
					<td>{{ $brigada->Brigada}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$brigadas->render()}}
	</div>
</div>

@endsection