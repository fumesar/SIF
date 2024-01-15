@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Instructor(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Instructor(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Idinstructor</th>
					<th>Documento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Estado</th>
				</thead>
               @foreach ($instructors as $instructor)
				<tr>
					
					<td>{{ $instructor->idinstructor}}</td>
					<td>{{ $instructor->Documento}}</td>
					<td>{{ $instructor->Nombres}}</td>
					<td>{{ $instructor->Apellidos}}</td>
					<td>{{ $instructor->Correo}}</td>
					<td>{{ $instructor->Telefono}}</td>
					<td>{{ $instructor->estado}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$instructors->render()}}
	</div>
</div>

@endsection