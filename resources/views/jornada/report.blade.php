@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Jornada(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Jornada(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdJornada</th>
					<th>Jornada</th>
				</thead>
               @foreach ($jornadas as $jornada)
				<tr>
					
					<td>{{ $jornada->idJornada}}</td>
					<td>{{ $jornada->Jornada}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$jornadas->render()}}
	</div>
</div>

@endsection