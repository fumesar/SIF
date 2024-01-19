@extends ('layouts.admin')
@section ('contenido')
    <center>
        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            <div class="form-group">
                <a href="{{URL::action('App\Http\Controllers\JefaturaControlador@index')}}"><button  class="btn btn-success">Volver</button></a>
                <a href=""><button onclick="imprimir();" class="btn btn-success">Imprimir</button></a>
            </div>
        </div>  
    </center>
	<div id="exportar2" class="row">
		
        <center>
            <img src="{{asset('img/header.png')}}" alt="Descripción de la imagen">
        </center>
        <center><h4>HOJA DE INSCRIPCIÓN</h4></center>
        <center><h4>JEFATURA</h4></center>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<!-- <h3>Detalles de Jefatura: {{ $jefatura->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($jefatura,['method'=>'GET','route'=>['jefatura.index']])!!}
            {{Form::token()}}
			
			
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION PERSONAL</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo Documento(*)</label>
                    <select name="idTipoDocumento" class="form-control" disabled>
                        @foreach ($tipo_documentos as $tipo_documento)
                            <option 
                                <?php if($tipo_documento->idTipoDocumento==$jefatura->idTipoDocumento): ?>
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
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{$jefatura->NumeroDocumento}}" placeholder="Numero Documento(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres(*)</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{$jefatura->Nombres}}" placeholder="Nombres(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos(*)</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{$jefatura->Apellidos}}" placeholder="Apellidos(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaNacimiento">Fecha Nacimiento</label>
	            	<input type="date" name="FechaNacimiento" class="form-control" value="{{$jefatura->FechaNacimiento}}" placeholder="Fecha Nacimiento..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Foto">Foto</label>
                    <!-- <input type="file" name="Foto" class="form-control" value="{{$jefatura->Foto}}" placeholder="Foto..." accept="image/*" disabled> -->
                </div>
            </div>

            <div>    
                <img src="{{Storage::url($jefatura->Foto)}}" alt="Sin imagen"
                            height="200px" width="200px" class="img-thumbnail">
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento Nacimiento(*)</label>
                    <select name="idDepartamentoNacimiento" class="form-control" disabled>
                        @foreach ($departamento_nacimientos as $departamento_nacimiento)
                            <option 
                                <?php if($departamento_nacimiento->idDepartamentoNacimiento==$jefatura->idDepartamentoNacimiento): ?>
                                        selected
                                <?php endif ?>
                                value="{{$departamento_nacimiento->idDepartamentoNacimiento}}"> {{$departamento_nacimiento->DepartamentoNacimiento}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="CiudadNacimiento">Ciudad Nacimiento</label>
	            	<input type="text" name="CiudadNacimiento" class="form-control" value="{{$jefatura->CiudadNacimiento}}" placeholder="Ciudad Nacimiento..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rh(*)</label>
                    <select name="idRH" class="form-control" disabled>
                        @foreach ($rhs as $rh)
                            <option 
                                <?php if($rh->idRH==$jefatura->idRH): ?>
                                        selected
                                <?php endif ?>
                                value="{{$rh->idRH}}"> {{$rh->RH}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Correo">Correo</label>
	            	<input type="text" name="Correo" class="form-control" value="{{$jefatura->Correo}}" placeholder="Correo..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{$jefatura->Telefono}}" placeholder="Telefono..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nivel Academico(*)</label>
                    <select name="idNivelAcademico" class="form-control" disabled>
                        @foreach ($nivel_academicos as $nivel_academico)
                            <option 
                                <?php if($nivel_academico->idNivelAcademico==$jefatura->idNivelAcademico): ?>
                                        selected
                                <?php endif ?>
                                value="{{$nivel_academico->idNivelAcademico}}"> {{$nivel_academico->NivelAcademico}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Direccion">Direccion</label>
	            	<input type="text" name="Direccion" class="form-control" value="{{$jefatura->Direccion}}" placeholder="Direccion..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento Residencia(*)</label>
                    <select name="idDepartamentoResidencia" class="form-control" disabled>
                        @foreach ($departamento_residencias as $departamento_residencia)
                            <option 
                                <?php if($departamento_residencia->idDepartamentoResidencia==$jefatura->idDepartamentoResidencia): ?>
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
	            	<input type="text" name="CiudadResidencia" class="form-control" value="{{$jefatura->CiudadResidencia}}" placeholder="Ciudad Residencia..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Localidad(*)</label>
                    <select name="idLocalidad" class="form-control" disabled>
                        @foreach ($localidads as $localidad)
                            <option 
                                <?php if($localidad->idLocalidad==$jefatura->idLocalidad): ?>
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
	            	<input type="text" name="Barrio" class="form-control" value="{{$jefatura->Barrio}}" placeholder="Barrio..." disabled>
	            </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION INTERNA</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estado Jefatura(*)</label>
                    <select name="idEstado" class="form-control" disabled>
                        @foreach ($estado_jefaturas as $estado_jefatura)
                            <option 
                                <?php if($estado_jefatura->idEstado==$jefatura->idEstado): ?>
                                        selected
                                <?php endif ?>
                                value="{{$estado_jefatura->idEstado}}"> {{$estado_jefatura->Estado}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rango(*)</label>
                    <select name="idRango" class="form-control" disabled>
                        @foreach ($rangos as $rango)
                            <option 
                                <?php if($rango->idRango==$jefatura->idRango): ?>
                                        selected
                                <?php endif ?>
                                value="{{$rango->idRango}}"> {{$rango->Rango}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Cargo(*)</label>
                    <select name="idCargo" class="form-control" disabled>
                        @foreach ($cargos as $cargo)
                            <option 
                                <?php if($cargo->idCargo==$jefatura->idCargo): ?>
                                        selected
                                <?php endif ?>
                                value="{{$cargo->idCargo}}"> {{$cargo->Cargo}}
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
                                <?php if($seccional->idSeccional==$jefatura->idSeccional): ?>
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
                                <?php if($brigada->idBrigada==$jefatura->idBrigada): ?>
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
                                <?php if($peloton->idPeloton==$jefatura->idPeloton): ?>
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
	            	<input type="date" name="FechaIngreso" id="FechaIngreso" class="form-control" value="{{$jefatura->FechaIngreso}}" placeholder="Fecha Ingreso..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Puesto(*)</label>
                    <select name="idPuesto" class="form-control" disabled>
                        @foreach ($puestos as $puesto)
                            <option 
                                <?php if($puesto->idPuesto==$jefatura->idPuesto): ?>
                                        selected
                                <?php endif ?>
                                value="{{$puesto->idPuesto}}"> {{$puesto->Puesto}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Antiguedad">Antiguedad</label>
	            	<input type="text" name="Antiguedad" id="Antiguedad" class="form-control" value="{{$jefatura->Antiguedad}}" placeholder="Antiguedad..." disabled>
	            </div>
            </div>
            @if($jefatura->idEstado==1)
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaAscenso">Fecha Ascenso</label>
	            	<input type="date" name="FechaAscenso" class="form-control" value="{{$jefatura->FechaAscenso}}" placeholder="Fecha Ascenso..." disabled>
	            </div>
            </div>
            @endif
            @if($jefatura->idEstado==2 or $jefatura->idEstado==3)
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaRetiro">Fecha Retiro</label>
	            	<input type="date" name="FechaRetiro" class="form-control" value="{{$jefatura->FechaRetiro}}" placeholder="Fecha Retiro..." disabled>
	            </div>
            </div>
            @endif
           </fieldset>
			{!!Form::close()!!}		
             <center>
                <img src="{{asset('img/firma.png')}}" alt="Descripción de la imagen">
            </center>
            <img src="{{asset('img/footer.png')}}" align="left" alt="Descripción de la imagen">
		</div>
	</div>
    @push('scripts')
    <script src="{{asset('js/jefatura.js')}}"></script> 
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