@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
		<div class="col-lg-12">
			<!-- <h3>Detalles de Anotacion: {{ $anotacion->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($anotacion,['method'=>'GET','route'=>['anotacion.index']])!!}
            {{Form::token()}}
            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >IDENTIFICACÍON</legend>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Identificacion">Identificacion</label>
                    <input type="text" name="Identificacion" class="form-control" value="{{$anotacion->Identificacion}}" placeholder="Identificacion..." disabled>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Nombres">Nombres</label>
                    <input type="text" name="Nombres" class="form-control" value="{{$anotacion->Nombres}}" placeholder="Nombres..." disabled>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Apellidos">Apellidos</label>
                    <input type="text" name="Apellidos" class="form-control" value="{{$anotacion->Apellidos}}" placeholder="Apellidos..." disabled>
                </div>
            </div>
            </fieldset>

			<style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >TIPO DE ANOTACIÓN</legend>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                             <label for="Fecha">Fecha(*)</label>
                             <input type="date" name="Fecha" class="form-control" value="{{$anotacion->Fecha}}" placeholder="Fecha..." disabled>
                       </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                             <label for="Titulo">Titulo</label>
                             <input type="text" name="Titulo" class="form-control" value="{{$anotacion->Titulo}}" placeholder="Titulo..." disabled>
                       </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>Tipo Anotacion(*)</label>
                              <select name="idTipoAnotacion" class="form-control" disabled>
                                   @foreach ($tipo_anotacions as $tipo_anotacion)
                                        <option 
                                            <?php if($tipo_anotacion->idTipoAnotacion==$anotacion->idTipoAnotacion): ?>
                                                    selected
                                            <?php endif ?>
                                            value="{{$tipo_anotacion->idTipoAnotacion}}"> {{$tipo_anotacion->TipoAnotacion}}
                                        </option>
                                    @endforeach
                             </select>
                        </div>
                  </div>
                 
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                         <div class="form-group">
                              <label>Falta(*)</label>
                              <select name="idfalta" class="form-control" disabled>
                                   @foreach ($faltas as $falta)
                                        <option 
                                            <?php if($falta->idfalta==$anotacion->idfalta): ?>
                                                    selected
                                            <?php endif ?>
                                            value="{{$falta->idfalta}}"> {{$falta->Falta}}
                                        </option>
                                    @endforeach
                             </select>
                        </div>
                  </div>
                  <div class="col-lg-12">
                        <div class="form-group">
                             <label for="Observacion">Observacion</label>
                             <textarea type="text" name="Observacion" class="form-control" value="{{$anotacion->Observacion}}" placeholder="Observacion..." disabled>{{$anotacion->Observacion}}</textarea>
                       </div>
                  </div>

                  <center>
                        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
                            <div class="form-group">
                                 <a href="{{URL::action('App\Http\Controllers\AnotacionControlador@index')}}" class="btn btn-danger">Volver</a>
                           </div>
                     </div> 
                  </center>
                  <input type="hidden" name="idJefatura" id="idJefatura">
                  <input type="hidden" name="Identificacion" id="Identificacion">
                  <input type="hidden" name="Nombres" id="Nombres">
                  <input type="hidden" name="Apellidos" id="Apellidos">
            </fieldset>

			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection