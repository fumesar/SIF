{!! Form::open(array('url'=>'calificacion/create','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    <div class="form-group">
        <label>Semestre(*)</label>
        <select name="idSemestre" id="idSemestre" class="form-control" onchange="filtrarCursos();">
            <option value="">Seleccionar</option>
            @foreach ($semestres as $semestre)
                <option {{ old('idSemestre',$query_idSemestre) == $semestre->idSemestre ? 'selected' : '' }}
                    value="{{$semestre->idSemestre}}">{{$semestre->Semestre}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    <div class="form-group">
        <label>Curso(*)</label>
        <select name="idCurso" id="idCurso" class="form-control" onchange="filtrarAsignaturas();">
            <option value="">Seleccionar</option>
            @foreach ($cursos as $curso)
                @if($curso->idSemestre==$query_idSemestre)
                    <option {{ old('idCurso',$query_idCurso) == $curso->idCurso ? 'selected' : '' }}
                        value="{{$curso->idCurso}}">{{$curso->NombreCurso}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
		
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
	<div class="form-group">
		<label>Asignatura(*)</label>
		<select name="idAsignatura" id="idAsignatura" class="form-control">
            <option value="">Seleccionar</option>
			@foreach ($asignaturas as $asignatura)
				<option {{ old('idAsignatura',$query_idAsignatura) == $asignatura->idAsignatura ? 'selected' : '' }}
                    value="{{$asignatura->idAsignatura}}">{{$asignatura->NombreAsignatura}}
                </option>
			@endforeach
		</select>
	</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </span>
        </div>
    </div>
</div>


{{Form::close()}}
<!-- <script>
    document.getElementById("idSemestre").value = document.getElementById("idSemestre1").value;
</script>| -->