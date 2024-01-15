@extends ('layouts.admin')
@section ('contenido')
<div class="row">
      <div class="col-lg-12">
            <h3>Nueva Anotacion</h3>
               @if (count($errors)>0)
                  <div class="alert alert-danger">
                    <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                    </ul>
                  </div>
                @endif
            @include('anotacion.search')
              {!!Form::open(array('url'=>'anotacion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
              {{Form::token()}}

<!--               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                   <div class="form-group">
                        <label>Jefatura(*)</label>
                        <select name="idJefatura" id="idJefatura" onchange="cambioJefatura();" class="form-control">
                             @foreach ($jefaturas as $jefatura)
                             <option value="{{$jefatura->idJefatura}}">{{$jefatura->NumeroDocumento.' '.$jefatura->Apellidos.','.$jefatura->Nombres}}</option>
                             @endforeach
                       </select>
                 </div>
            </div> -->
            

            <style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
            </style>
            <fieldset class="form-group">  
                <legend >TIPO DE ANOTACIÓN</legend>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                             <label for="Fecha">Fecha(*)</label>
                             <input type="date" name="Fecha" class="form-control" placeholder="Fecha...">
                       </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                             <label for="Titulo">Titulo</label>
                             <input type="text" name="Titulo" class="form-control" placeholder="Titulo...">
                       </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>Tipo Anotacion(*)</label>
                              <select name="idTipoAnotacion" class="form-control">
                                   @foreach ($tipo_anotacions as $tipo_anotacion)
                                   <option value="{{$tipo_anotacion->idTipoAnotacion}}">{{$tipo_anotacion->TipoAnotacion}}</option>
                                   @endforeach
                             </select>
                        </div>
                  </div>
                 
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                         <div class="form-group">
                              <label>Falta(*)</label>
                              <select name="idfalta" class="form-control">
                                   @foreach ($faltas as $falta)
                                   <option value="{{$falta->idfalta}}">{{$falta->Falta}}</option>
                                   @endforeach
                             </select>
                        </div>
                  </div>
                  <div class="col-lg-12">
                        <div class="form-group">
                             <label for="Observacion">Observacion</label>
                             <textarea type="text" name="Observacion" class="form-control" placeholder="Observacion..."></textarea>
                       </div>
                  </div>

                  <center>
                        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
                            <div class="form-group">
                                 <button class="btn btn-primary" type="submit">Guardar</button>
                                 <button class="btn btn-danger" type="reset">Cancelar</button>
                           </div>
                     </div>	
                  </center>
                  <input type="hidden" name="idJefatura" id="idJefatura">
                  <input type="hidden" name="Identificacion" id="Identificacion">
                  <input type="hidden" name="Nombres" id="Nombres">
                  <input type="hidden" name="Apellidos" id="Apellidos">
            </fieldset>
            {!!Form::close()!!}		
            <script src="{{asset('js/anotacion.js')}}"></script>             
      </div>
</div>
@endsection