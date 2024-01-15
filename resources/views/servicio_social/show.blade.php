@extends ('layouts.admin')
@section ('contenido')
    <center>
        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            <div class="form-group">
                <a href="{{URL::action('App\Http\Controllers\Servicio_socialControlador@index')}}"><button  class="btn btn-success">Volver</button></a>
                <a href=""><button onclick="imprimir();" class="btn btn-success">Imprimir</button></a>
            </div>
        </div>  
    </center>
	<div id="exportar2" class="row">

        <center>
            <img src="{{asset('img/header.png')}}" alt="Descripción de la imagen">
        </center>
        <center><h4>HOJA DE INSCRIPCIÓN</h4></center>
        <center><h4>SERVICIO SOCIAL</h4></center>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<!-- <h3>Detalles de Servicio_social: {{ $servicio_social->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($servicio_social,['method'=>'GET','route'=>['servicio_social.index']])!!}
            {{Form::token()}}
			
			
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION GENERAL</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo Documento(*)</label>
                    <select name="idTipoDocumento" class="form-control" disabled>
                        @foreach ($tipo_documentos as $tipo_documento)
                            <option 
                                <?php if($tipo_documento->idTipoDocumento==$servicio_social->idTipoDocumento): ?>
                                        selected
                                <?php endif ?>
                                value="{{$tipo_documento->idTipoDocumento}}"> {{$tipo_documento->TipoDocumento}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NumeroDocumento">Numero Documento(*)</label>
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{$servicio_social->NumeroDocumento}}" placeholder="Numero Documento(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres(*)</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{$servicio_social->Nombres}}" placeholder="Nombres(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos(*)</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{$servicio_social->Apellidos}}" placeholder="Apellidos(*)..." disabled>
	            </div>
            </div>
                    
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{$servicio_social->Telefono}}" placeholder="Telefono..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Direccion">Direccion</label>
	            	<input type="text" name="Direccion" class="form-control" value="{{$servicio_social->Direccion}}" placeholder="Direccion..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento Residencia(*)</label>
                    <select name="idDepartamentoResidencia" class="form-control" disabled>
                        @foreach ($departamento_residencias as $departamento_residencia)
                            <option 
                                <?php if($departamento_residencia->idDepartamentoResidencia==$servicio_social->idDepartamentoResidencia): ?>
                                        selected
                                <?php endif ?>
                                value="{{$departamento_residencia->idDepartamentoResidencia}}"> {{$departamento_residencia->DepartamentoResidencia}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="CiudadResidencia">Ciudad Residencia</label>
	            	<input type="text" name="CiudadResidencia" class="form-control" value="{{$servicio_social->CiudadResidencia}}" placeholder="Ciudad Residencia..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Correo">Correo</label>
	            	<input type="text" name="Correo" class="form-control" value="{{$servicio_social->Correo}}" placeholder="Correo..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Localidad(*)</label>
                    <select name="idLocalidad" class="form-control" disabled>
                        @foreach ($localidads as $localidad)
                            <option 
                                <?php if($localidad->idLocalidad==$servicio_social->idLocalidad): ?>
                                        selected
                                <?php endif ?>
                                value="{{$localidad->idLocalidad}}"> {{$localidad->Localidad}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Barrio">Barrio</label>
	            	<input type="text" name="Barrio" class="form-control" value="{{$servicio_social->Barrio}}" placeholder="Barrio..." disabled>
	            </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION ACADEMICA</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio(*)</label>
                    <select name="idColegio" class="form-control" disabled>
                        @foreach ($colegios as $colegio)
                            <option 
                                <?php if($colegio->idColegio==$servicio_social->idColegio): ?>
                                        selected
                                <?php endif ?>
                                value="{{$colegio->idColegio}}"> {{$colegio->Colegio}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Curso Colegio(*)</label>
                    <select name="idCursoCol" class="form-control" disabled>
                        @foreach ($curso_colegios as $curso_colegio)
                            <option 
                                <?php if($curso_colegio->idCursoCol==$servicio_social->idCursoCol): ?>
                                        selected
                                <?php endif ?>
                                value="{{$curso_colegio->idCursoCol}}"> {{$curso_colegio->Curso}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Jornada(*)</label>
                    <select name="idJornada" class="form-control" disabled>
                        @foreach ($jornadas as $jornada)
                            <option 
                                <?php if($jornada->idJornada==$servicio_social->idJornada): ?>
                                        selected
                                <?php endif ?>
                                value="{{$jornada->idJornada}}"> {{$jornada->Jornada}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Horas">Horas</label>
	            	<input type="text" name="Horas" class="form-control" value="{{$servicio_social->Horas}}" placeholder="Horas..." disabled>
	            </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION INTERNA</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estado(*)</label>
                    <select name="idEstado" class="form-control" disabled>
                        @foreach ($estados as $estado)
                            <option 
                                <?php if($estado->idEstado==$servicio_social->idEstado): ?>
                                        selected
                                <?php endif ?>
                                value="{{$estado->idEstado}}"> {{$estado->Estado}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Seccional(*)</label>
                    <select name="idSeccional" class="form-control" disabled>
                        @foreach ($seccionals as $seccional)
                            <option 
                                <?php if($seccional->idSeccional==$servicio_social->idSeccional): ?>
                                        selected
                                <?php endif ?>
                                value="{{$seccional->idSeccional}}"> {{$seccional->Seccional}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Brigada(*)</label>
                    <select name="idBrigada" class="form-control" disabled>
                        @foreach ($brigadas as $brigada)
                            <option 
                                <?php if($brigada->idBrigada==$servicio_social->idBrigada): ?>
                                        selected
                                <?php endif ?>
                                value="{{$brigada->idBrigada}}"> {{$brigada->Brigada}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Peloton(*)</label>
                    <select name="idPeloton" class="form-control" disabled>
                        @foreach ($pelotons as $peloton)
                            <option 
                                <?php if($peloton->idPeloton==$servicio_social->idPeloton): ?>
                                        selected
                                <?php endif ?>
                                value="{{$peloton->idPeloton}}"> {{$peloton->Peloton}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaIngreso">Fecha Ingreso</label>
	            	<input type="date" name="FechaIngreso" class="form-control" value="{{$servicio_social->FechaIngreso}}" placeholder="Fecha Ingreso..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaFinalizacion">Fecha Finalizacion</label>
	            	<input type="date" name="FechaFinalizacion" class="form-control" value="{{$servicio_social->FechaFinalizacion}}" placeholder="Fecha Finalizacion..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Semestre(*)</label>
                    <select name="idSemestre" class="form-control" disabled>
                        @foreach ($semestres as $semestre)
                            <option 
                                <?php if($semestre->idSemestre==$servicio_social->idSemestre): ?>
                                        selected
                                <?php endif ?>
                                value="{{$semestre->idSemestre}}"> {{$semestre->Semestre}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>           </fieldset>
			{!!Form::close()!!}		
             <center>
                <img src="{{asset('img/firma.png')}}" alt="Descripción de la imagen">
            </center>
            <img src="{{asset('img/footer.png')}}" align="left" alt="Descripción de la imagen">
		</div>
	</div>
	@push('scripts')   
	  <script>
	        var Igv=0;
	        $(document).ready(function(){
	           });
	           function imprimir(){
	            var printContent = document.getElementById('exportar2');
	            var WinPrint = window.open('', '', 'width=1100,height=800');
	            WinPrint.document.write(printContent.innerHTML);
	            WinPrint.document.close();
	        }

	  </script>
    @endpush
@endsection