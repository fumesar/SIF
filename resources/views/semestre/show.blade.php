@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <center>
                <img src="{{asset('img/header.png')}}" alt="Descripción de la imagen">
            </center>
        <center><h4>HOJA DE INSCRIPCIÓN TERCEROS</h4></center>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Semestre: {{ $semestre->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($semestre,['method'=>'GET','route'=>['semestre.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="Semestre">Semestre(*)</label>
	            	<input type="text" name="Semestre" class="form-control" value="{{$semestre->Semestre}}" placeholder="Semestre(*)..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaInicio">Fecha Inicio</label>
	            	<input type="date" name="FechaInicio" class="form-control" value="{{$semestre->FechaInicio}}" placeholder="Fecha Inicio..." disabled>
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="FechaFinal">Fecha Final</label>
	            	<input type="date" name="FechaFinal" class="form-control" value="{{$semestre->FechaFinal}}" placeholder="Fecha Final..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\SemestreControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>

			{!!Form::close()!!}		
           
		</div>
	</div>
	
@endsection