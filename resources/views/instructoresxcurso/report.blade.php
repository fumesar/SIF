@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte de Instructoresxcurso(s)</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Instructoresxcurso(s)"; </script>
			<table id="exportar" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>IdInstructoresxCurso</th>
					<th>Instructor</th>
					<th>Curso</th>
				</thead>
               @foreach ($instructoresxcursos as $instructoresxcurso)
				<tr>
					
					<td>{{ $instructoresxcurso->idInstructoresxCurso}}</td>
					<td>{{ $instructoresxcurso->instructor}}</td>
					<td>{{ $instructoresxcurso->curso}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$instructoresxcursos->render()}}
	</div>
</div>

@endsection