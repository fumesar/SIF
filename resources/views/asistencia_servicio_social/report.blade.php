@extends ('layouts.admin')
@section ('contenido')
<div  id="exportar2">
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reporte De Asistencia</h3>
	</div>
</div>
@include('asistencia_servicio_social.search2')
<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Asistencia_servicio_social(s)"; </script>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th colspan="3" class="text text-center"></th>
					@if(count($sabado)<5)
						<th colspan="4" class="text text-center">{{$elMes}}</th>
					@endif
					@if(count($sabado)==5)
						<th colspan="5" class="text text-center">{{$elMes}}</th>
					@endif
					<th colspan="4" class="text text-center">TOTALES</th>
				</thead>
				<thead>
					
					<th class="text text-center">No.</th>
					<th class="text text-center">Nombres</th>
					<th class="text text-center">Apellidos</th>
					@foreach ($sabado as $sab)
						<th class="text text-center">{{substr($sab,-2)}}</th>
					@endforeach
					<th  class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></th>
					<th  class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px"></th>
					<th  class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px"></th>
					<th  class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></th>
				</thead>
               @foreach ($asistencia_servicio_socials as $key => $asistencia_servicio_social)
				<tr>
					
					<td class="text text-center">{{ $key+1}}</td>
					<td>{{ $asistencia_servicio_social->Nombres }}</td>
					<td>{{ $asistencia_servicio_social->Apellidos }}</td>
					@if($asistencia_servicio_social->as1==1)
					<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as1==2)
					<td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as1==3)
					<td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as1==4)
					<td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as1=='')
					<td class="text text-center">NR</td>
					@endif

					@if($asistencia_servicio_social->as2==1)
					<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as2==2)
					<td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as2==3)
					<td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as2==4)
					<td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as2=='')
					<td class="text text-center">NR</td>
					@endif

					@if($asistencia_servicio_social->as3==1)
					<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as3==2)
					<td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as3==3)
					<td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as3==4)
					<td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as3=='')
					<td class="text text-center">NR</td>
					@endif

					@if($asistencia_servicio_social->as4==1)
					<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as4==2)
					<td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as4==3)
					<td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>
					@endif
					@if($asistencia_servicio_social->as4==4)
					<td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>
					@endif
					@if($asistencia_servicio_social->as4=='')
					<td class="text text-center">NR</td>
					@endif

					@if(count($sabado)==5)
						@if($asistencia_servicio_social->as5==1)
						<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>
						@endif
						@if($asistencia_servicio_social->as5==2)
						<td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>
						@endif
						@if($asistencia_servicio_social->as5==3)
						<td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>
						@endif
						@if($asistencia_servicio_social->as5==4)
						<td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>
						@endif
						@if($asistencia_servicio_social->as5=='')
						<td class="text text-center">NR</td>
						@endif
					@endif
					<td id="p_{{$key}}" class="text text-center"></td>
					<td id="a_{{$key}}" class="text text-center"></td>
					<td id="t_{{$key}}" class="text text-center"></td>
					<td id="l_{{$key}}" class="text text-center"></td>
				</tr>
				@endforeach
			</table>
		</div>
		
	</div>
</div>
</div>
<center>
    <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
        <div class="form-group">
            <!-- <a href="{{URL::action('App\Http\Controllers\JefaturaControlador@index')}}"><button  class="btn btn-success">Volver</button></a> -->
            <a href=""><button onclick="imprimir();" class="btn btn-success">Imprimir</button></a>
        </div>
    </div>  
</center>
@push('scripts')
<script>

	        $(document).ready(function(){
	           });
	           function imprimir(){
	            var printContent = document.getElementById('exportar2');
	            var WinPrint = window.open('', '', 'width=1100,height=800');
	            WinPrint.document.write(printContent.innerHTML);
	            WinPrint.document.close();
	        }



	const sabado = @json($sabado);
	const asistencia_servicio_socials = @json($asistencia_servicio_socials);
	console.log(asistencia_servicio_socials);
	
	for (var i = 0; i < asistencia_servicio_socials.length; i++) {
		conteo_as1=0;
		if(asistencia_servicio_socials[i].as1==1){
			conteo_as1++;
		}
		if(asistencia_servicio_socials[i].as2==1){
			conteo_as1++;
		}
		if(asistencia_servicio_socials[i].as3==1){
			conteo_as1++;
		}
		if(asistencia_servicio_socials[i].as4==1){
			conteo_as1++;
		}
		if(sabado.length==5){
			if(asistencia_servicio_socials[i].as5==1){
				conteo_as1++;
			}
		}
		$("#p_"+i).html(conteo_as1);

		conteo_as2=0;
		if(asistencia_servicio_socials[i].as1==2){
			conteo_as2++;
		}
		if(asistencia_servicio_socials[i].as2==2){
			conteo_as2++;
		}
		if(asistencia_servicio_socials[i].as3==2){
			conteo_as2++;
		}
		if(asistencia_servicio_socials[i].as4==2){
			conteo_as2++;
		}
		if(sabado.length==5){
			if(asistencia_servicio_socials[i].as5==2){
				conteo_as2++;
			}
		}
		$("#a_"+i).html(conteo_as2);

		conteo_as3=0;
		if(asistencia_servicio_socials[i].as1==3){
			conteo_as3++;
		}
		if(asistencia_servicio_socials[i].as2==3){
			conteo_as3++;
		}
		if(asistencia_servicio_socials[i].as3==3){
			conteo_as3++;
		}
		if(asistencia_servicio_socials[i].as4==3){
			conteo_as3++;
		}
		if(sabado.length==5){
			if(asistencia_servicio_socials[i].as5==3){
				conteo_as3++;
			}
		}
		$("#t_"+i).html(conteo_as3);

		conteo_as4=0;
		if(asistencia_servicio_socials[i].as1==4){
			conteo_as4++;
		}
		if(asistencia_servicio_socials[i].as2==4){
			conteo_as4++;
		}
		if(asistencia_servicio_socials[i].as3==4){
			conteo_as4++;
		}
		if(asistencia_servicio_socials[i].as4==4){
			conteo_as4++;
		}
		if(sabado.length==5){
			if(asistencia_servicio_socials[i].as5==4){
				conteo_as4++;
			}
		}
		$("#l_"+i).html(conteo_as4);
	}
	
	//$("#p_1").html(4);
</script>   
@endpush  
@endsection