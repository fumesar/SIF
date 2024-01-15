@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Asistencia</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
            
            @include('asistencia.search')

			{!!Form::open(array('url'=>'asistencia','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			<input type="hidden" name=Fecha value="{{$query_Fecha}}">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th style="display:none">idJefatura</th>
                <th style="display:none">idMatricula</th>
                <th style="display:none">idAsistencia</th>
                <th>No.</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Estado Asistencia</th>
                <th>Opciones</th>

              </thead>
                @foreach ($asistencias as $key => $asistencia)
                  <tr>
                    <td style="display:none"><input type="text" name="idJefatura[]" value="{{ $asistencia->idMatricula}}"readonly> </td>
                    <td style="display:none"><input type="text" name="idMatricula[]" value="{{ $asistencia->idMatricula}}"readonly> </td>
                    <td style="display:none"><input type="text" name="idAsistencia[]" value="{{ $asistencia->idAsistencia}}"readonly> </td>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $asistencia->Nombres }}</td>
                    <td>{{ $asistencia->Apellidos }}</td>
                    <td><strong><input type="text" name="asistencia[]" id="asistencia_{{$key}}" value="{{ $asistencia->EstadoAsistencia }}" readonly></strong></td>
                    <td>
                      <img src="{{asset('img/PRESENTE.png')}}" onclick="colocar({{$key}},'Presente');" height="20px" width="20px" alt="Presente">
                      <img src="{{asset('img/AUSENTE.png')}}" onclick="colocar({{$key}},'Ausente');" height="20px" width="20px" alt="Ausente">
                      <img src="{{asset('img/TARDE.png')}}" onclick="colocar({{$key}},'Tarde');" height="20px" width="20px" alt="Tarde">
                      <img src="{{asset('img/LICENCIA.png')}}" onclick="colocar({{$key}},'Licencia');" height="20px" width="20px" alt="Licencia">
                    </td>
                  </tr>          
                @endforeach
            </table>
        </div>
        {{$asistencias->render()}}
        		              
  			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit">Guardar</button>
		            	<button class="btn btn-danger" type="reset">Cancelar</button>
            		</div>
            	</div>	
        	</center>
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection