@extends ('layouts.admin')
@section ('contenido')
    <center>
        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            <div class="form-group">
                <a href="{{URL::action('App\Http\Controllers\TerceroControlador@index')}}"><button  class="btn btn-success">Volver</button></a>
                <a href=""><button onclick="imprimir();" class="btn btn-success">Imprmir</button></a>
            </div>
        </div>  
    </center>
	<div id="exportar2" class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <center>
                <img src="{{asset('img/header.png')}}" alt="Descripción de la imagen">
            </center>
        <center><h4>HOJA DE INSCRIPCIÓN TERCEROS</h4></center>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- <h3>Detalles de Antiguedad: {{ $antiguedad->nombre}}</h3> -->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($antiguedad,['method'=>'GET','route'=>['antiguedad.index']])!!}
            {{Form::token()}}
			
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rango(*)</label>
                    <select name="idRango" class="form-control">
                        @foreach ($rangos as $rango)
                            <option 
                                <?php if($rango->idRango==$antiguedad->idRango): ?>
                                        selected
                                <?php endif ?>
                                value="{{$rango->idRango}}"> {{$rango->Rango}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
	            	<label for="anos">Anos</label>
	            	<input type="text" name="anos" class="form-control" value="{{$antiguedad->anos}}" placeholder="Anos...">
	            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rango(*)</label>
                    <select name="idRangoAnterior" class="form-control">
                        @foreach ($rangos as $rango)
                            <option 
                                <?php if($rango->idRango==$antiguedad->idRangoAnterior): ?>
                                        selected
                                <?php endif ?>
                                value="{{$rango->idRango}}"> {{$rango->Rango}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
			{!!Form::close()!!}		
             <center>
                <img src="{{asset('img/firma.png')}}" alt="Descripción de la imagen">
            </center>
            <img src="{{asset('img/footer.png')}}" align="left" alt="Descripción de la imagen">
		</div>
	</div>
	@push('scripts')   
	  <script>
	        var Igv=0;
	        $(document).ready(function(){
	           });
	           function imprimir(){
	            var printContent = document.getElementById('exportar2');
	            var WinPrint = window.open('', '', 'width=1100,height=800');
	            WinPrint.document.write(printContent.innerHTML);
	            WinPrint.document.close();
	        }

	  </script>
    @endpush
@endsection