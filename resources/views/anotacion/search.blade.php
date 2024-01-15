{!! Form::open(array('url'=>'anotacion/create','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-12">
	<style> fieldset { margin: 20px; padding: 0 10px 10px; border: 1px solid #666; border-radius: 8px; box-shadow: 0 0 10px #666; padding-top: 10px; } legend {width:inherit; padding: 2px 4px; background: #fff; /* For better legibility against the box-shadow */ } fieldset > legend { float: left; margin-top: -20px; } fieldset > legend + * { clear: both; } 
    </style>
    <fieldset class="form-group">  
        <legend >BUSCAR PERSONA</legend>
        <div class="row">
	        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	              <div class="form-group">
	                   <label for="Identificacion">Identificacion</label>
	                   <input type="text" name="query_Identificacion" class="form-control" placeholder="Identificacion...">
	             </div>
	        </div>
	    </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                       <label for="Nombres">Nombres</label>
                       <input type="text" name="query_Nombres" class="form-control" placeholder="Nombres...">
                 </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                       <label for="Apellidos">Apellidos</label>
                       <input type="text" name="query_Apellidos" class="form-control" placeholder="Apellidos...">
                 </div>
            </div>
        </div>
		<center>
			<div class="form-group">
				<div class="input-group ">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Ingresar</button>
					</span>
				</div>
			</div>
		</center>

		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							
							<th>Rango</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Opciones</th>
						</thead>
						@foreach ($jefaturas as $jefatura)
							<tr>
								<td>{{ $jefatura->rango}}</td>
								<td>{{ $jefatura->Nombres}}</td>
								<td>{{ $jefatura->Apellidos}}</td>
								<td><a class="btn btn-success" onclick="seleccionar({{ $jefatura->idJefatura }} );">
									Seleccionar</a>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</fieldset>
</div>
{{Form::close()}}
<script>
	function seleccionar(idJefatura){
		//console.log(idJefatura);
		jefatura  = @json($jefaturas);
		//console.log(jefatura);
		const result = jefatura.filter(jefatura => jefatura.idJefatura === idJefatura);
		//console.log(result);
		document.getElementById('idJefatura').value=idJefatura;
		document.getElementById('Identificacion').value=result[0].NumeroDocumento;
		document.getElementById('Nombres').value=result[0].Nombres;
		document.getElementById('Apellidos').value=result[0].Apellidos;
	}

</script>


