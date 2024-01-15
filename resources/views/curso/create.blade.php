@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Curso</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'curso','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
			
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                  	<label for="NombreCurso">Nombre Curso(*)</label>
                  	<input type="text" name="NombreCurso" value="{{ old('NombreCurso') }}" class="form-control" placeholder="NombreCurso...">
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label>Semestre(*)</label>
                <select name="idSemestre" class="form-control">
                  @foreach ($semestres as $semestre)
                    <option value="{{$semestre->idSemestre}}">{{$semestre->Semestre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
        		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        			<div class="form-group">
        				<label>Estado(*)</label>
        				<select name="idEstado" class="form-control">
        					@foreach ($estados as $estado)
        						<option value="{{$estado->idEstado}}">{{$estado->Estado}}</option>
        					@endforeach
        				</select>
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
@endsection