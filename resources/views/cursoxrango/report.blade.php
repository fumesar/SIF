@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Cursoxrango(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Cursoxrango(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdCursoxRango</th>
					<th>Rango</th>
					<th>Curso</th>
				</thead>
               @foreach ($cursoxrangos as $cursoxrango)
				<tr>
					
					<td>{{ $cursoxrango->idCursoxRango}}</td>
					<td>{{ $cursoxrango->rango}}</td>
					<td>{{ $cursoxrango->curso}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$cursoxrangos->render()}}
	</div>
</div>

@endsection