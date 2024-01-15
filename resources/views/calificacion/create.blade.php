@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Nuevo Calificacion</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @include('calificacion.search')
        {!!Form::open(array('url'=>'calificacion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <input type="hidden" name="idSemestre" value="{{$query_idSemestre}}">
        <input type="hidden" name="idCurso" value="{{$query_idCurso}}">
        <input type="hidden" name="idAsignatura" value="{{$query_idAsignatura}}">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="tabla_notas" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>No.</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Nota</th>
                            <th>Promedio</th>
                            <!-- <th>Escoger Nota</th> -->
                        </thead>
                        @foreach ($calificacions as $key => $calificacion)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $calificacion->Nombres}}</td>
                            <td>{{ $calificacion->Apellidos}}</td>
                            <td id="d{{$calificacion->idJefatura}}"><input type="number" name="notas[]" value="{{ $calificacion->Nota}}" 
                                onchange="colocarPromedio({{$calificacion->idJefatura}},this);"></td>
                            <td id="p{{$calificacion->idJefatura}}">{{ $calificacion->Promedio }}</td>
                            <!-- <td>
                                <a href="" onClick="nota({{$calificacion->Documento}},0);" class="btn btn-info">0</a>
                                <a href="" onClick="nota({{$calificacion->Documento}},1);" class="btn btn-info">1</a>
                                <a href="" onClick="nota({{$calificacion->Documento}},2);" class="btn btn-info">2</a>
                                <a href="" onClick="nota({{$calificacion->Documento}},3);" class="btn btn-info">3</a>
                                <a href="" onClick="nota({{$calificacion->Documento}},4);" class="btn btn-info">4</a>
                                <a href="" onClick="nota({{$calificacion->Documento}},5);" class="btn btn-info">5</a>
                            </td> -->
                            <td><input type="hidden" name="jefaturas[]" value="{{ $calificacion->idJefatura}}"></td>
                            <td><input type="hidden" name="documentos[]" value="{{ $calificacion->Documento}}"></td>
                        </tr>
                        @endforeach
                        <tfoot>
                          <th>PROMEDIO TOTAL GENERAL</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th id="total" class="text-center"></th>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        
        <center>
            <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 ">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>  
        </center>
        {!!Form::close()!!}

    </div>
</div>


<script>
  calculaTotales();
  // Suma los totales
  function calculaTotales(){
    let total1=0;
    //console.log(document.getElementById("detalles").rows.length);
    for (var i = 1; i<document.getElementById("tabla_notas").rows.length-1; i++) {
      $dato1=document.getElementById("tabla_notas").rows[i].cells[4].innerText;

      total1=Number(total1)+Number($dato1);
      //console.log($dato1,total1);
    }
    //total1=Math.round(total1*10)/10;
    total1= total1 / (document.getElementById("tabla_notas").rows.length - 2) ;
    //$('table#compra tfoot th:nth-child(' + 2 + ')').text(total1); 
    document.getElementById("total").innerText=total1.toFixed(1);
    return true;
   }

    function nota($idJefatura, $valor) {
         $("#d"+$idJefatura).html($valor);
    }
    function colocarPromedio($idJefatura,$this) {
        $("#p"+$idJefatura).html( $this.value );
        calculaTotales();
    }
    
     function filtrarCursos(select){ 
        const cursos = @json($cursos);
        console.log(cursos);

        let idSemestre = document.getElementById('idSemestre').value;
        console.log(idSemestre);

        const result = cursos.filter(cursos => cursos.idSemestre === Number(idSemestre));
        console.log(result)

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
        filtrarAsignaturas();
    }
    
    function filtrarAsignaturas(select){ 
        const asignaturas = @json($asignaturas);
        console.log(asignaturas);

        let idCurso = document.getElementById('idCurso').value;
        console.log(idCurso);

        const result = asignaturas.filter(asignaturas => asignaturas.idCurso === Number(idCurso));
        console.log(result)

        if (idCurso != 0) { 
            num_asignaturas = result.length 
            document.getElementById("idAsignatura").length = num_asignaturas;

            for(i=0;i<num_asignaturas;i++){ 
                idAsignatura.options[i].value=result[i].idAsignatura;
                idAsignatura.options[i].text=result[i].NombreAsignatura;
            }   
        }else{ 
            document.getElementById("idAsignatura").length  = 1 
            idAsignatura.options[0].value = "" 
            idAsignatura.options[0].text = "Seleccionar" 
        } 
        idAsignatura.options[0].selected = true 
    }
</script>
@endsection