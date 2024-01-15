@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Estado_jefatura(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Estado_jefatura(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdEstado</th>
					<th>Estado</th>
				</thead>
               @foreach ($estado_jefaturas as $estado_jefatura)
				<tr>
					
					<td>{{ $estado_jefatura->idEstado}}</td>
					<td>{{ $estado_jefatura->Estado}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$estado_jefaturas->render()}}
	</div>
</div>

@endsection