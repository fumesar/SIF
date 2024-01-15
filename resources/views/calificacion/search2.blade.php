{!! Form::open(array('url'=>'calificacion_report','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="row">
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"></div>
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
</div>
<div class="row">
    <center>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Generar</button>
                </span>
            </div>
        </div>
    </center>
</div>
{{Form::close()}}