@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Rh(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Rh(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdRH</th>
					<th>RH</th>
				</thead>
               @foreach ($rhs as $rh)
				<tr>
					
					<td>{{ $rh->idRH}}</td>
					<td>{{ $rh->RH}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$rhs->render()}}
	</div>
</div>

@endsection