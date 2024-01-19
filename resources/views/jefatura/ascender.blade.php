@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Ascender : {{ $jefatura->Nombres}} {{$jefatura->Apellidos}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($jefatura,['method'=>'PATCH','files'=>'true','route'=>['jefatura.updaterango',$jefatura->idJefatura]])!!}
            {{Form::token()}}
			
			
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION PERSONAL</legend>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Tipo Documento(*)</label>
    				<select name="idTipoDocumento" class="form-control">
                        <option value="">Seleccionar</option>
    					@foreach ($tipo_documentos as $tipo_documento)
    						<option 
                                {{ old('idTipoDocumento',$jefatura->idTipoDocumento) == $tipo_documento->idTipoDocumento ? 'selected' : '' }} 
    							value="{{$tipo_documento->idTipoDocumento}}"> {{$tipo_documento->TipoDocumento}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NumeroDocumento">Numero Documento(*)</label>
	            	<input type="text" name="NumeroDocumento" class="form-control" value="{{old('NumeroDocumento',$jefatura->NumeroDocumento)}}" placeholder="Numero Documento(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres(*)</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{old('Nombres',$jefatura->Nombres)}}" placeholder="Nombres(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos(*)</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{old('Apellidos',$jefatura->Apellidos)}}" placeholder="Apellidos(*)...">
	            </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Foto">Foto</label>
                    <input type="file" name="Foto" id="Foto" class="form-control" value="{{old('Foto',$jefatura->Foto)}}" placeholder="Foto..." accept="image/*" onchange="colocarFoto();">

                    <div class="text-center">
                        <img src="{{Storage::url($jefatura->Foto)}}" alt="Sin imagen" height="200px" width="200px" class="img-thumbnail">

                        <a href="javascript:void(0);" onclick="limpiarFoto();">
                            <span class="badge badge-danger">X</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Rango">Rango actual </label>
	            	<input type="text" name="Rango" class="form-control" value="{{$rangoActual}}" placeholder="Rango(*)..." disabled="">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Antiguedad">Antiguedad en Rango</label>
                  	<input type="text" name="Antiguedad" id="Antiguedad" class="form-control" value="{{ $firstDate }}" placeholder="Antiguedad..." disabled>
                  </div>
            </div>
           </fieldset>
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >INFORMACION INTERNA</legend>
                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				@if($cursosPorCumplir)
	    				<label>Cursos a cumplir :</label><br>
	    				@foreach($cursosPorCumplir as $cursoPorCumplir)
	    					<label>- {{$cursoPorCumplir->NombreCurso}}</label>
	    					<br>
                    	@endforeach
                    	<br>
                    	<label>Cumple cursos : {{$cumpleCursos == true ? 'SI' : 'NO'}}</label>
                	@endif
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				@if ($tiempo_rango)
	    				<label>Tiempo a cumplir : {{$tiempo_rango->descripcion }}</label>
	    				<label>Tiempo cumplido : {{$intvl->y}}  años, {{$intvl->m}} meses y {{$intvl->d}} dias </label>
                    	<label>Cumple tiempo : {{$cumpleTiempoAscenso == true ? 'SI' : 'NO'}}</label>

                	@endif
    			</div>
    		</div>
    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Rango a ascender</label>
    				<select name="idRango" class="form-control" readonly>
    					@if ($rango)
    						<option 
                                {{ old('idRango',$jefatura->idRango) == $rango->idRango ? 'selected' : '' }} 
    							value="{{$rango->idRango}}"> {{$rango->Rango}}
    						</option>
    					@endif
    				</select>
    			</div>
    		</div>


           </fieldset>
			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
            			@if($cumpleCursos == true and $cumpleTiempoAscenso == true)
		            	<input type="image" src="{{asset('img/ASCENDER.png')}}" alt="Submit" width="40" height="40">
		            	@endif
		            	<input type="image" src="{{asset('img/GENERAR.png')}}" alt="Submit" width="40" height="40">
            		</div>
            	</div>	
        	</center>
			{!!Form::close()!!}		
            @push('scripts')
            <script src="{{asset('js/jefatura.js')}}"></script>   
            @endpush 
		</div>
	</div>
@endsection