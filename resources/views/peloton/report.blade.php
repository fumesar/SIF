@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Peloton(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Peloton(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdPeloton</th>
					<th>Peloton</th>
				</thead>
               @foreach ($pelotons as $peloton)
				<tr>
					
					<td>{{ $peloton->idPeloton}}</td>
					<td>{{ $peloton->Peloton}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$pelotons->render()}}
	</div>
</div>

@endsection