@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Prestamo Equipo: {{ $prestamo_equipo->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($prestamo_equipo,['method'=>'PATCH','route'=>['prestamo_equipo.update',$prestamo_equipo->idPrestamoEquipo]])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NroDocumento">Nro Documento(*)</label>
	            	<input type="text" name="NroDocumento" class="form-control" value="{{old('NroDocumento',$prestamo_equipo->NroDocumento)}}" placeholder="Nro Documento(*)...">
	            </div>
            </div>

    		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    			<div class="form-group">
    				<label>Equipo(*)</label>
    				<select name="idEquipo" id="idEquipo"  class="form-control" onchange="cambiarReferencia(this);">
    					<option value="">Seleccionar</option>
    					@foreach ($equipos as $equipo)
    						<option 
    							{{ old('idEquipo',$prestamo_equipo->idEquipo) == $equipo->idEquipo ? 'selected' : '' }} 
    							value="{{$equipo->idEquipo}}"> {{$equipo->NombreEquipo}}
    						</option>
    					@endforeach
    				</select>
    			</div>
    		</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Referencia">Referencia</label>
	            	<input type="text" name="Referencia"  id="Referencia" class="form-control" value="{{old('Referencia',$prestamo_equipo->Referencia)}}" placeholder="Referencia...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaVencimiento">Fecha Vencimiento(*)</label>
	            	<input type="date" name="FechaVencimiento" class="form-control" value="{{old('FechaVencimiento',$prestamo_equipo->FechaVencimiento)}}" placeholder="Fecha Vencimiento(*)...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nota">Nota</label>
	            	<input type="text" name="Nota" class="form-control" value="{{old('Nota',$prestamo_equipo->Nota)}}" placeholder="Nota..." readonly>
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

    } 
}
</script>	
@endsection