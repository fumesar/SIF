@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte De Servicio Social</h3>
	</div>
</div>
@include('servicio_social.search')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Servicio_social(s)"; </script>
			<table id="exportarX" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th class="text-center">No.</th>
					<th class="text text-center">Nombres</th>
					<th class="text text-center">Apellidos</th>
					<th class="text-center">Telefono</th>
					<th class="text-center">Estado</th>
					<th class="text text-center">Seccional</th>
					<th class="text-center">Brigada</th>
					<th class="text-center">Peloton</th>
				</thead>
               @foreach ($servicio_socials as $key => $servicio_social)
				<tr>					
					<td class="text text-center">{{ $key + 1  }}</td>
					<td>{{ $servicio_social->Nombres}}</td>
					<td>{{ $servicio_social->Apellidos}}</td>
					<td class="text-center">{{ $servicio_social->Telefono}}</td>
					<td class="text-center">{{ $servicio_social->estado}}</td>
					<td class="text-center">{{ $servicio_social->seccional}}</td>
					<td class="text text-center">{{ $servicio_social->brigada}}</td>
					<td class="text text-center">{{ $servicio_social->peloton}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$servicio_socials->render()}}
	</div>
</div>
<style>
.dataTable tbody thead th:nth-child(1)  {
    text-align: center; }
.dataTable tbody thead th:nth-child(7)  {
    text-align: center; }
.dataTable tbody thead th:nth-child(8)  {
    text-align: center; }

.dataTable tbody tr td:nth-child(1)  {
    text-align: center; }
.dataTable tbody tr td:nth-child(7)  {
    text-align: center; }
.dataTable tbody tr td:nth-child(8)  {
    text-align: center; }

</style>
@push('scripts')
<script>
$(document).ready(function() {    
    $('#exportarX').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
         
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      'Excel ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      'PDF',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		],
		      
    });     
});
</script>
@endpush 
@endsection