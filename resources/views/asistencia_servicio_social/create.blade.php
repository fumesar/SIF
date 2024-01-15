@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado De Asistencia Servicio Social <a href="asistencia_servicio_social/create"><!-- <button class="btn btn-success">Nuevo</button> --></a></h3>
    
  </div>
</div>
@include('asistencia_servicio_social.search')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			{!!Form::open(array('url'=>'asistencia_servicio_social','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
      <input type="hidden" name=Fecha value="{{$query_Fecha}}">
			<div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th style="display:none">idServicioSocial</th>
            <th style="display:none">idAsistencia</th>
            <th class="text text-center">No.</th>
            <th class="text text-center">Nombres</th>
            <th class="text text-center">Apellidos</th>
            <th class="text text-center">Estado Asistencia</th>
            <th class="text text-center">Opciones</th>

          </thead>
                 @foreach ($asistencia_servicio_socials as $key => $asistencia_servicio_social)
          <tr>
            <td style="display:none"><input type="text" name="idServicioSocial[]" value="{{ $asistencia_servicio_social->idServicioSocial}}"readonly> </td>
            <td style="display:none"><input type="text" name="idAsistencia[]" value="{{ $asistencia_servicio_social->idAsistencia}}"readonly> </td>
            <td>{{ $key +1 }}</td>
            <td>{{ $asistencia_servicio_social->Nombres }}</td>
            <td>{{ $asistencia_servicio_social->Apellidos }}</td>
            <td><strong><input type="text" name="asistencia[]" id="asistencia_{{$key}}" value="{{ $asistencia_servicio_social->EstadoAsistencia }}" readonly></strong></td>
            <td>
              <img src="{{asset('img/PRESENTE.png')}}" onclick="colocar({{$key}},'Presente');" height="20px" width="20px" alt="Presente">
              <img src="{{asset('img/AUSENTE.png')}}" onclick="colocar({{$key}},'Ausente');" height="20px" width="20px" alt="Ausente">
              <img src="{{asset('img/TARDE.png')}}" onclick="colocar({{$key}},'Tarde');" height="20px" width="20px" alt="Tarde">
              <img src="{{asset('img/LICENCIA.png')}}" onclick="colocar({{$key}},'Excusa');" height="20px" width="20px" alt="Excusa">
              <img src="{{asset('img/BORRAR.png')}}" onclick="colocar({{$key}},'');" height="20px" width="20px" alt="Borrar">
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      {{$asistencia_servicio_socials->render()}}
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
<script>
function colocar($key,$asistencia){
  $("#asistencia_"+$key).val($asistencia);
}
</script>
@endsection