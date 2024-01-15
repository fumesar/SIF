@extends ('layouts.admin')
@section ('contenido')
   
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Detalles De Prestamo Equipo: {{ $prestamo_equipo->nombre}}</h3> 
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($prestamo_equipo,['method'=>'GET','route'=>['prestamo_equipo.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="NroDocumento">Nro Documento(*)</label>
	            	<input type="text" name="NroDocumento" class="form-control" value="{{$prestamo_equipo->NroDocumento}}" placeholder="Nro Documento(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Equipo(*)</label>
                    <select name="idEquipo" class="form-control" disabled>
                        @foreach ($equipos as $equipo)
                            <option 
                                <?php if($equipo->idEquipo==$prestamo_equipo->idEquipo): ?>
                                        selected
                                <?php endif ?>
                                value="{{$equipo->idEquipo}}"> {{$equipo->NombreEquipo}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Referencia">Referencia</label>
	            	<input type="text" name="Referencia" class="form-control" value="{{$prestamo_equipo->Referencia}}" placeholder="Referencia..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaVencimiento">Fecha Vencimiento(*)</label>
	            	<input type="date" name="FechaVencimiento" class="form-control" value="{{$prestamo_equipo->FechaVencimiento}}" placeholder="Fecha Vencimiento(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nota">Nota</label>
	            	<input type="text" name="Nota" class="form-control" value="{{$prestamo_equipo->Nota}}" placeholder="Nota..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\Prestamo_equipoControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
            
		</div>
	</div>
	
@endsection