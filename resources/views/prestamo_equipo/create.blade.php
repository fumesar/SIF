@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Prestamo Equipo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'prestamo_equipo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="NroDocumento">Nro Documento(*)</label>
                  	<input type="text" name="NroDocumento" class="form-control" placeholder="NroDocumento...">
                  </div>
            </div>

        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Equipo(*)</label>
        				<select name="idEquipo" id="idEquipo" class="form-control" onchange="cambiarReferencia(this);">
                  <option value="">Seleccionar</option>
        					@foreach ($equipos as $equipo)
        						<option value="{{$equipo->idEquipo}}">{{$equipo->NombreEquipo}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Referencia">Referencia</label>
                  	<input type="text" name="Referencia" id="Referencia" class="form-control" placeholder="Referencia..." readonly>
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="FechaVencimiento">Fecha Vencimiento(*)</label>
                  	<input type="date" name="FechaVencimiento" class="form-control" placeholder="FechaVencimiento...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Nota">Nota</label>
                  	<input type="text" name="Nota" class="form-control" placeholder="Nota..." value="En Prestamo" readonly>
                  </div>
            </div>
                
  			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
		            	<input type="image" src="{{asset('img/EMITIR PRESTAMO.png')}}" alt="Submit" width="40" height="40">
		            	<!-- <button class="btn btn-danger" type="reset">Cancelar</button> -->
            		</div>
            	</div>	
        	</center>
			{!!Form::close()!!}		
            
		</div>
	</div>
<script>    

function cambiarReferencia(select){ 
    const equipos = @json($equipos);
    console.log(equipos);

    idEquipo = document.getElementById('idEquipo').value;
    console.log(idEquipo);

    const result = equipos.filter(equipos => equipos.idEquipo === Number(idEquipo));
    console.log(result);

    if (result != 0) { 
        document.getElementById("Referencia").value = result[0].Referencia;
        //document.getElementById("Nota").value = 'En Prestamo';
    } 
}
</script>
@endsection