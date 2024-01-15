@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Seccional(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Seccional(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdSeccional</th>
					<th>Seccional</th>
				</thead>
               @foreach ($seccionals as $seccional)
				<tr>
					
					<td>{{ $seccional->idSeccional}}</td>
					<td>{{ $seccional->Seccional}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$seccionals->render()}}
	</div>
</div>

@endsection