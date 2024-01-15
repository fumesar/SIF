@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Matricular</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'matricular','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Semestre(*)</label>
        				<select name="idSemestre" id="idSemestre" class="form-control" onchange="filtrarCursos();">
                    <option value="">Seleccionar</option>
        					@foreach ($semestres as $semestre)
        						<option value="{{$semestre->idSemestre}}">{{$semestre->Semestre}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Documento">Documento</label>
                  	<input type="text" name="Documento" id="Documento" onchange="cambioDocumento();" class="form-control" placeholder="Documento...">
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Nombres">Nombres</label>
                  	<input type="text" name="Nombres" id="Nombres" class="form-control" placeholder="Nombres..." readonly>
                  </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="Apellidos">Apellidos</label>
                  	<input type="text" name="Apellidos" id="Apellidos" class="form-control" placeholder="Apellidos..." readonly>
                  </div>
            </div>

        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Curso(*)</label>
        				<select name="idCurso" id="idCurso" class="form-control">
                  <option value="">Seleccionar</option>
        					<!-- @foreach ($cursos as $curso)
        						<option value="{{$curso->idCurso}}">{{$curso->NombreCurso}}</option>
        					@endforeach -->
        				</select>
        			</div>
        		</div>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Estado Matricula(*)</label>
        				<select name="idEstadoMatricula" class="form-control">
        					@foreach ($estado_matriculas as $estado_matricula)
        						<option value="{{$estado_matricula->idEstadoMatricula}}">{{$estado_matricula->EstadoMatricula}}</option>
        					@endforeach
        				</select>
        			</div>
        		</div>                
  			<center>
  				<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit">Matricular</button>
		            	<button class="btn btn-danger" type="reset">Cancelar</button>
            		</div>
            	</div>	
        	</center>
			{!!Form::close()!!}		
      <script src="{{asset('js/matricular.js')}}"></script>      
		</div>
	</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>    

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
 
        idCurso.options[0].value = "-" 
        idCurso.options[0].text = "-" 
    } 

    idCurso.options[0].selected = true 
}
</script>
@endsection