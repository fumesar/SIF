@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Nivel_academico(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Nivel_academico(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdNivelAcademico</th>
					<th>NivelAcademico</th>
				</thead>
               @foreach ($nivel_academicos as $nivel_academico)
				<tr>
					
					<td>{{ $nivel_academico->idNivelAcademico}}</td>
					<td>{{ $nivel_academico->NivelAcademico}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$nivel_academicos->render()}}
	</div>
</div>

@endsection