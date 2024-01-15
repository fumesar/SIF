@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario: {{ $usuario->name}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id]])!!}
            {{Form::token()}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">NombreX</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$usuario->name }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail </label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email}}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Rol(*)</label>
                    <select name="idrol" id="idrol" class="form-control" onchange="evaluarColegio();">
                        <option value="">Seleccionar</option>
                        @foreach ($roles as $rol)
                            <option 
                                {{ old('idrol',$usuario->rol_id) == $rol->id ? 'selected' : '' }}
                                value="{{$rol->id}}">{{$rol->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="colegio2" class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none">
                <div class="form-group">
                    <label>Colegio(*)</label>
                    <select name="idColegio" class="form-control">
                        <option value="">Seleccionar</option>
                        @foreach ($colegios as $colegio)
                            <option 
                                {{ old('idColegio',$usuario->idColegio) == $colegio->idColegio ? 'selected' : '' }} 
                                value="{{$colegio->idColegio}}"> {{$colegio->Colegio}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@push('scripts')
<script>
    evaluarColegio();
    function evaluarColegio() {
        roltext = $("#idrol option:selected").text();
        roltext=roltext.toLowerCase();
        roltext=roltext.trim();
        if (roltext == 'colegios') {  //colegios
            $("#colegio2").show();
        } else {
            $("#colegio2").hide();
        }
      }
</script>
@endpush
@endsection