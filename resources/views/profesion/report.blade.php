@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Profesion(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Profesion(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdProfesion</th>
					<th>Profesion</th>
				</thead>
               @foreach ($profesions as $profesion)
				<tr>
					
					<td>{{ $profesion->idProfesion}}</td>
					<td>{{ $profesion->Profesion}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$profesions->render()}}
	</div>
</div>

@endsection