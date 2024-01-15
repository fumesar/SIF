@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Instructor: {{ $instructor->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($instructor,['method'=>'GET','route'=>['instructor.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Documento">Documento(*)</label>
	            	<input type="text" name="Documento" class="form-control" value="{{$instructor->Documento}}" placeholder="Documento(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Nombres">Nombres(*)</label>
	            	<input type="text" name="Nombres" class="form-control" value="{{$instructor->Nombres}}" placeholder="Nombres(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Apellidos">Apellidos(*)</label>
	            	<input type="text" name="Apellidos" class="form-control" value="{{$instructor->Apellidos}}" placeholder="Apellidos(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Correo">Correo</label>
	            	<input type="text" name="Correo" class="form-control" value="{{$instructor->Correo}}" placeholder="Correo..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Telefono">Telefono</label>
	            	<input type="text" name="Telefono" class="form-control" value="{{$instructor->Telefono}}" placeholder="Telefono..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Estado(*)</label>
                    <select name="idEstado" class="form-control" disabled> 
                        @foreach ($estados as $estado)
                            <option 
                                <?php if($estado->idEstado==$instructor->idEstado): ?>
                                        selected
                                <?php endif ?>
                                value="{{$estado->idEstado}}"> {{$estado->Estado}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\InstructorControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
             
		</div>
	</div>
	
@endsection