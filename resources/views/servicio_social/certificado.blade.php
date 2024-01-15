@extends ('layouts.admin')
@section ('contenido')
<center>
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
			<a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@indexCertificados')}}"><button class="btn btn-success">Volver</button></a>
			<a href=""><button onclick="imprimir();" class="btn btn-success">Imprmir</button></a>
		</div>
	</div>
</center>
<div id="exportar2" class="contenedor">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img src="{{asset('img/certificado2.png')}}" width="800px" height="1000px"  alt="Descripción de la imagen" >
			<div class="centrado" style="text-align: justify;" background="img/certificado.png">
				<font face="Arial" size=4>
				<p >
					<br>
					Que <B> {{strtoupper($servicio_social->Nombres)}} {{strtoupper($servicio_social->Apellidos)}}  </B> Identificada(o) con documento de identidad No. <B> {{$servicio_social->NumeroDocumento}} </B> del 
						<B>
						@foreach ($colegios as $colegio)
						<?php if ($colegio->idColegio == $servicio_social->idColegio) : ?> {{$colegio->Colegio}} <?php endif ?>
						@endforeach
						</B>
					 del curso <B>
						@foreach ($curso_colegios as $curso_colegio)
						<?php if ($curso_colegio->idCursoCol == $servicio_social->idCursoCol) : ?> {{$curso_colegio->Curso}} <?php endif ?>
						@endforeach </B>
						jornada <B>
						@foreach ($jornadas as $jornada)
						 <?php if ($jornada->idJornada == $servicio_social->idJornada) : ?> {{$jornada->Jornada}} <?php endif ?> 
						@endforeach </B>
					 presto <B> {{$servicio_social->Horas}}  HORAS </B> de servicio social estudiantil en nuestra entidad. 
				</p>
				<br>
				<p>Dada en Bogotá D.C, a los {{$fecha}} </p>
				<br>
				<p>En constancia se firma la presente, por quienes intervinieron en cumplimiento de 
					lo ordenado en la resolución 4210 del ministerio de educación nacional y normas 
					concordantes.</p> 
				<br>
   				<p>Cordialmente </p>

  				</font>

			</div> 
		</div>	
	</div>
	<style>
		.contenedor{
		    position: relative;
		    display: inline-block;
		    text-align: center;
		}
		 

		.centrado{
		    position: absolute;
		    top: 46%;
		    left: 44%;
		    right: -15%;
		    transform: translate(-40%, -40%);
		}
	</style>
	@push('scripts')
	<script>
		$(document).ready(function() {});

		function imprimir() {
			var printContent = document.getElementById('exportar2');
            var WinPrint = window.open();
            WinPrint.document.write(printContent.innerHTML);
            //WinPrint.print();
            WinPrint.document.close();
		}
	</script>
	@endpush
	@endsection