@extends ('layouts.admin')
@section ('contenido')
<div  id="exportar2">
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>REPORTE DE ASISTENCIA</h3>
	</div>
</div>
@include('asistencia.search2')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<script> document.title = "Reporte de Asistencia(s)"; </script>
			<input type="hidden" name="idCurso" value="{{$query_idCurso}}">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th colspan="3" class="text text-center"></th>
					<th colspan="31" class="text text-center">{{$elMes}}</th>
					<th colspan="4" class="text text-center">TOTALES</th>
				</thead>
				<thead>
					<th class="text text-center">No.</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th class="text text-center">1</th>
					<th class="text text-center">2</th>
					<th class="text text-center">3</th>
					<th class="text text-center">4</th>
					<th class="text text-center">5</th>
					<th class="text text-center">6</th>
					<th class="text text-center">7</th>
					<th class="text text-center">8</th>
					<th class="text text-center">9</th>
					<th class="text text-center">10</th>
					<th class="text text-center">11</th>
					<th class="text text-center">12</th>
					<th class="text text-center">13</th>
					<th class="text text-center">14</th>
					<th class="text text-center">15</th>
					<th class="text text-center">16</th>
					<th class="text text-center">17</th>
					<th class="text text-center">18</th>
					<th class="text text-center">19</th>
					<th class="text text-center">20</th>
					<th class="text text-center">21</th>
					<th class="text text-center">22</th>
					<th class="text text-center">23</th>
					<th class="text text-center">24</th>
					<th class="text text-center">25</th>
					<th class="text text-center">26</th>
					<th class="text text-center">27</th>
					<th class="text text-center">28</th>
					<th class="text text-center">29</th>
					<th class="text text-center">30</th>
					<th class="text text-center">31</th>
					<th class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></th>
					<th class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px"></th>
					<th class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px"></th>
					<th class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></th>
				</thead>
               @foreach ($asistencias as $key => $asistencia)
				<tr>
					
					<td class="text text-center">{{ $key+1}}</td>
					<td>{{ $asistencia->Nombres }}</td>
					<td>{{ $asistencia->Apellidos }}</td>
					@if($asistencia->d1==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d1==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d1==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d1==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d1=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d2==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d2==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d2==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d2==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d2=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d3==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d3==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d3==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d3==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d3=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d4==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d4==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d4==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d4==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d4=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d5==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d5==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d5==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d5==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d5=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d6==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d6==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d6==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d6==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d6=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d7==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d7==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d7==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d7==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d7=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d8==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d8==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d8==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d8==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d8=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d9==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d9==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d9==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d9==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d9=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d10==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d10==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d10==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d10==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d10=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d11==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d11==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d11==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d11==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d11=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d12==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d12==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d12==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d12==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d12=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d13==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d13==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d13==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d13==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d13=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d14==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d14==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d14==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d14==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d14=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d15==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d15==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d15==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d15==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d15=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d16==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d16==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d16==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d16==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d16=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d17==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d17==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d17==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d17==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d17=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d18==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d18==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d18==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d18==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d18=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d19==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d19==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d19==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d19==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d19=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d20==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d20==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d20==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d20==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d20=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d21==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d21==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d21==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d21==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d21=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d22==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d22==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d22==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d22==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d22=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d23==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d23==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d23==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d23==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d23=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d24==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d24==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d24==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d24==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d24=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d25==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d25==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d25==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d25==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d25=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d26==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d26==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d26==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d26==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d26=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d27==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d27==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d27==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d27==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d27=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d28==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d28==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d28==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d28==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d28=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d29==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d29==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d29==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d29==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d29=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d30==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d30==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d30==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d30==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d30=='') <td class="text text-center">NR</td> @endif

					@if($asistencia->d31==1)	<td class="text text-center"><img src="{{asset('img/PRESENTE.png')}}" type="image/png" height="20px" width="20px"></td>@endif @if($asistencia->d31==2) <td class="text text-center"><img src="{{asset('img/AUSENTE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif @if($asistencia->d31==3) <td class="text text-center"><img src="{{asset('img/TARDE.png')}}" type="image/png" height="20px" width="20px" ></td>@endif
					@if($asistencia->d31==4) <td class="text text-center"><img src="{{asset('img/LICENCIA.png')}}" type="image/png" height="20px" width="20px"></td>@endif
					@if($asistencia->d31=='') <td class="text text-center">NR</td> @endif

					<td class="text text-center">{{ $asistencia->t1 }}</td>
					<td class="text text-center">{{ $asistencia->t2 }}</td>
					<td class="text text-center">{{ $asistencia->t3 }}</td>
					<td class="text text-center">{{ $asistencia->t4 }}</td>
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
            <a href=""><button onclick="imprimir();" class="btn btn-success">Imprmir</button></a>
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

	function filtrarCursos(select){ 
        const cursos = @json($cursos);
        console.log(cursos);

        idSemestre = document.getElementById('idSemestre').value;
        console.log(idSemestre);

        const result = cursos.filter(cursos => cursos.idSemestre === Number(idSemestre));
        //console.log(resultidSemestre    
        if (idSemestre != 0) { 
            num_cursos = result.length 
            document.getElementById("idCurso").length = num_cursos;

            for(i=0;i<num_cursos;i++){ 
                idCurso.options[i].value=result[i].idCurso;
                idCurso.options[i].text=result[i].NombreCurso;
            }   
        }else{ 
            document.getElementById("idCurso").length  = 1 
            idCurso.options[0].value = "" 
            idCurso.options[0].text = "Seleccionar" 
        } 
        idCurso.options[0].selected = true 
    }

</script>   
@endpush  
@endsection