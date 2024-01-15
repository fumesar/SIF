@extends ('layouts.admin')
@section ('contenido')
    
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <center>
                <img src="{{asset('img/header.png')}}" alt="Descripción de la imagen">
            </center>
        <center><h4>HOJA DE INSCRIPCIÓN TERCEROS</h4></center>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Tipo_documento: {{ $tipo_documento->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tipo_documento,['method'=>'GET','route'=>['tipo_documento.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="TipoDocumento">Tipo Documento(*)</label>
	            	<input type="text" name="TipoDocumento" class="form-control" value="{{$tipo_documento->TipoDocumento}}" placeholder="Tipo Documento(*)..." disabled>
	            </div>
            </div>
            <div class="form-group text-right">
                <a href="{{URL::action('App\Http\Controllers\Tipo_documentoControlador@index')}}" class="btn btn-danger">Volver</a>
            </div>
			{!!Form::close()!!}		
            
		</div>
	</div>
	
@endsection