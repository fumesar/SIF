@extends ('layouts.admin')
@section ('contenido')
<div  id="exportar2">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Reporte de Calificacion(s)</h3>
		</div>
	</div>
	@include('calificacion.search2')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<script> document.title = "Reporte de Calificacion(s)"; </script>
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th colspan="3" class="text text-center"></th>
						@foreach ($asignaturas as $asignatura)
							<th class="text text-center">{{$asignatura->NombreAsignatura}}</th>
						@endforeach
						<th class="text text-center">PROMEDIO</th>
					</thead>
					<thead>
						<th>No.</th>
	                    <th>Nombres</th>
	                    <th>Apellidos</th>
	                    @if($asignaturas)
	                    <th colspan="{{count($asignaturas)}}" class="text text-center">{{$query_NombreCurso[0]}}</th>
	                    @endif
	                    <th class="text text-center">FINAL</th>
					</thead>
					<div style="display:none">	{{$i=0}}</div>
	                @foreach ($calificacions as $key => $calificacion)
	                	<div style="display:none">	{{$i=$i+1}}</div>
	                    <tr>
	                        <td>{{ $i}}</td>
	                        <td>{{ $calificacion->Nombres}}</td>
	                        <td>{{ $calificacion->Apellidos}}</td>
	                        @foreach ( json_decode($calificacion->calificaciones) as $nota)
	                        	<td class="text text-center">{{ $nota}} </td>
							@endforeach
	                    </tr>
	                @endforeach
				</table>
			</div>
			
		</div>
		<center>
		    <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
		        <div class="form-group">
		            <!-- <a href="{{URL::action('App\Http\Controllers\JefaturaControlador@index')}}"><button  class="btn btn-success">Volver</button></a> -->
		            <a href=""><button onclick="imprimir();" class="btn btn-success">Imprmir</button></a>
		        </div>
		    </div>  
		</center>
	</div>
</div>
<script>
    function imprimir(){
        var printContent = document.getElementById('exportar2');
        var WinPrint = window.open('', '', 'width=1100,height=800');
        WinPrint.document.write(printContent.innerHTML);
        WinPrint.document.close();
    }
	
  	function filtrarCursos(select){ 
        const cursos = @json($cursos);
        console.log(cursos);

        let idSemestre = document.getElementById('idSemestre').value;
        console.log(idSemestre);

        const result = cursos.filter(cursos => cursos.idSemestre === Number(idSemestre));
        console.log(result)

        if (idSemestre != 0) { 
            num_cursos = result.length 
            document.getElementById("idCurso").length = num_cursos;

            for(i=0;i<num_cursos;i++){ 
                idCurso.options[i].value=result[i].idCurso;
                idCurso.options[i].text=result[i].NombreCurso;
            }   
        }else{ 
            document.getElementById("idCurso").length  = 1 
            idCurso.options[0].value = "" 
            idCurso.options[0].text = "Seleccionar" 
        } 
        idCurso.options[0].selected = true 
        filtrarAsignaturas();
    }
</script>
@endsection