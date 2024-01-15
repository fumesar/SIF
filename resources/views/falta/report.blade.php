@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Falta(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Falta(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Idfalta</th>
					<th>Falta</th>
				</thead>
               @foreach ($faltas as $falta)
				<tr>
					
					<td>{{ $falta->idfalta}}</td>
					<td>{{ $falta->Falta}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$faltas->render()}}
	</div>
</div>

@endsection