@extends ('layouts.admin')
@section ('contenido')
    <center>
        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            <div class="form-group">
                <a href="{{URL::action('App\Http\Controllers\TerceroControlador@index')}}"><button  class="btn btn-success">Volver</button></a>
                <a href=""><button onclick="imprimir();" class="btn btn-success">Imprmir</button></a>
            </div>
        </div>  
    </center>
	<div id="exportar2" class="row">
		<center>
        <img src="{{asset('img/header.png')}}" alt="Descripción de la imagen">
        </center>
        <center><h4>HOJA DE INSCRIPCIÓN TERCEROS</h4></center>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<!-- <h3>Detalles de Tercero: {{ $tercero->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tercero,['method'=>'GET','route'=>['tercero.index']])!!}
            {{Form::token()}}
				
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset id="InformacionPersonal" class="form-group">  
                <legend >INFORMACIÓN PERSONAL</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo Tercero(*)</label>
                    <select name="idTipoTercero" class="form-control" disabled>
                        @foreach ($tipo_terceros as $tipo_tercero)
                            <option 
                                <?php if($tipo_tercero->idTipoTercero==$tercero->idTipoTercero): ?>
                                        selected
                                <?php endif ?>
                                value="{{$tipo_tercero->idTipoTercero}}"> {{$tipo_tercero->TipoTercero}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo Documento(*)</label>
                    <select name="idTipoDocumento" class="form-control" disabled>
                        @foreach ($tipo_documentos as $tipo_documento)
                            <option 
                                <?php if($tipo_documento->idTipoDocumento==$tercero->idTipoDocumento): ?>
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
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{$tercero->NumeroDocumento}}" placeholder="Numero Documento(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres(*)</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{$tercero->Nombres}}" placeholder="Nombres(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos(*)</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{$tercero->Apellidos}}" placeholder="Apellidos(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaNacimiento">Fecha Nacimiento</label>
	            	<input type="date" name="FechaNacimiento" class="form-control" value="{{$tercero->FechaNacimiento}}" placeholder="Fecha Nacimiento..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento Nacimiento(*)</label>
                    <select name="idDepartamentoNacimiento" class="form-control" disabled>
                        @foreach ($departamento_nacimientos as $departamento_nacimiento)
                            <option 
                                <?php if($departamento_nacimiento->idDepartamentoNacimiento==$tercero->idDepartamentoNacimiento): ?>
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
	            	<input type="text" name="CiudadNacimiento" class="form-control" value="{{$tercero->CiudadNacimiento}}" placeholder="Ciudad Nacimiento..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rh(*)</label>
                    <select name="idRH" class="form-control" disabled>
                        @foreach ($rhs as $rh)
                            <option 
                                <?php if($rh->idRH==$tercero->idRH): ?>
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
	            	<input type="text" name="Correo" class="form-control" value="{{$tercero->Correo}}" placeholder="Correo..." disabled >
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{$tercero->Telefono}}" placeholder="Telefono..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Direccion">Direccion</label>
	            	<input type="text" name="Direccion" class="form-control" value="{{$tercero->Direccion}}" placeholder="Direccion..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento Residencia(*)</label>
                    <select name="idDepartamentoResidencia" class="form-control" disabled>
                        @foreach ($departamento_residencias as $departamento_residencia)
                            <option 
                                <?php if($departamento_residencia->idDepartamentoResidencia==$tercero->idDepartamentoResidencia): ?>
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
                    <label>Profesion(*)</label>
                    <select name="idProfesion" class="form-control" disabled>
                        @foreach ($profesions as $profesion)
                            <option 
                                <?php if($profesion->idProfesion==$tercero->idProfesion): ?>
                                        selected
                                <?php endif ?>
                                value="{{$profesion->idProfesion}}"> {{$profesion->Profesion}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="CiudadResidencia">Ciudad Residencia</label>
	            	<input type="text" name="CiudadResidencia" class="form-control" value="{{$tercero->CiudadResidencia}}" placeholder="Ciudad Residencia..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nivel Academico(*)</label>
                    <select name="idNivelAcademico" class="form-control" disabled>
                        @foreach ($nivel_academicos as $nivel_academico)
                            <option 
                                <?php if($nivel_academico->idNivelAcademico==$tercero->idNivelAcademico): ?>
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
                    <label>Localidad(*)</label>
                    <select name="idLocalidad" class="form-control" disabled>
                        @foreach ($localidads as $localidad)
                            <option 
                                <?php if($localidad->idLocalidad==$tercero->idLocalidad): ?>
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
	            	<input type="text" name="Barrio" class="form-control" value="{{$tercero->Barrio}}" placeholder="Barrio...">
	            </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset id="InformacionInterna" class="form-group">  
                <legend >INFORMACIÓN INTERNA</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estado(*)</label>
                    <select name="idEstado" class="form-control" disabled>
                        @foreach ($estados as $estado)
                            <option 
                                <?php if($estado->idEstado==$tercero->idEstado): ?>
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
                    <label>Cargo(*)</label>
                    <select name="idCargo" class="form-control" disabled>
                        @foreach ($cargos as $cargo)
                            <option 
                                <?php if($cargo->idCargo==$tercero->idCargo): ?>
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
	            	<label for="FechaIngreso">Fecha Ingreso</label>
	            	<input type="date" name="FechaIngreso" class="form-control" value="{{$tercero->FechaIngreso}}" placeholder="Fecha Ingreso..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaRetiro">Fecha Retiro</label>
	            	<input type="date" name="FechaRetiro" class="form-control" value="{{$tercero->FechaRetiro}}" placeholder="Fecha Retiro..." disabled>
	            </div>
            </div>
           </fieldset>
			{!!Form::close()!!}		
             <center>
                <img src="{{asset('img/firma.png')}}" alt="Descripción de la imagen">
            </center>
            <img src="{{asset('img/footer.png')}}" align="left" alt="Descripción de la imagen">
		</div>
	</div>
 
    <script src="{{asset('js/tercero.js')}}"></script>      
@endsection