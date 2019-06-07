@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Cliente</h3>
				</div>
				<div class="panel-body">
					<div class="table-container">
						<form method="POST" action="{{ route('cliente.edit', [$cliente->id] ) }}"  role="form" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 cliente_form">
									<div class="form-group">
										<input type="text" name="codigo" id="codigo" class="form-control input-sm" placeholder="Código cliente" value="{{$cliente->codigo}}">
									</div>
									<div class="form-group">
										<input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Cédula" value="{{$cliente->cedula}}">
									</div>
									<div class="form-group">
										<input type="text" name="expedicion" id="expedicion" class="form-control input-sm" placeholder="Fecha de expedición" value="{{$cliente->expedicion}}">
									</div>
									<div class="form-group">
										<input type="text" name="nombres" id="nombres" class="form-control input-sm" placeholder="Nombres" value="{{$cliente->nombres}}">
									</div>

									<div class="form-group">
										<input type="text" name="apellidos" id="apellidos" class="form-control input-sm" placeholder="Apellidos" value="{{$cliente->apellidos}}">
									</div>
									<div class="form-group">
										<input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Dirección"  value="{{$cliente->direccion}}">
									</div>
									<div class="form-group">
										<input type="text" name="barrio" id="barrio" class="form-control input-sm" placeholder="Barrio" value="{{$cliente->barrio}}">
									</div>
									<div class="form-group">
										<input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="Ciudad" value="{{$cliente->ciudad}}">
									</div>
									<div class="form-group">
										<input type="text" name="departamento" id="departamento" class="form-control input-sm" placeholder="Departamento" value="{{$cliente->departamento}}">
									</div>
									<div class="form-group">
										<input type="text" name="nacimiento" id="nacimiento" class="form-control input-sm" placeholder="Fecha de nacimiento" value="{{$cliente->nacimiento}}">
									</div>
									<div class="form-group">
										<input type="text" name="celular" id="celular" class="form-control input-sm" placeholder="# Celular" value="{{$cliente->celular}}">
									</div>
									<div class="form-group">
										<input type="text" name="referido_id" id="referido_id" class="form-control input-sm" placeholder="Referido id" value="{{$cliente->referido_id}}">
									</div>
									<div class="form-group">
										<input type="text" name="referido_nombre" id="referido_nombre" class="form-control input-sm" placeholder="Referido nombre" value="{{$cliente->referido_nombre}}">
									</div>
									<div class="form-group">
										<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Correo electronico" value="{{$cliente->email}}">
									</div>
									<div class="form-group">
										<input type="text" name="activacion" id="activacion" class="form-control input-sm" placeholder="Fecha de activación" value="{{$cliente->activacion}}">
									</div>
									<div class="form-group">
										<input type="text" name="chip" id="chip" class="form-control input-sm" placeholder="Número de chip" value="{{$cliente->chip}}">
									</div>
									<div class="form-group">
										<label for="foto_chip">Foto Chip</label>
										<input type="file" name="foto_chip" id="foto_chip" class="form-control input-sm" placeholder="Foto de chip">
									</div>
									<div class="form-group">
										<input type="text" name="numero_temporal_flash" id="numero_temporal_flash" class="form-control input-sm" placeholder="Número temporal flash" value="{{$cliente->numero_temporal_flash}}">
									</div>
									<div class="form-group">
										<input type="text" name="valor_recarga_activacion" id="valor_recarga_activacion" class="form-control input-sm" placeholder="Valor recarga activación" value="{{$cliente->valor_recarga_activacion}}">
									</div>
									<div class="form-group">
										<input type="text" name="plan_flash_mobile" id="plan_flash_mobile" class="form-control input-sm" placeholder="Plan flash mobile" value="{{$cliente->plan_flash_mobile}}">
									</div>
									<div class="form-group">
										<input type="text" name="numero_a_portar" id="numero_a_portar" class="form-control input-sm" placeholder="Número a portar" value="{{$cliente->numero_a_portar}}">
									</div>
									<div class="form-group">
										<input type="text" name="operador" id="operador" class="form-control input-sm" placeholder="Operador" value="{{$cliente->operador}}">
									</div>
									<div class="form-group">
										<select class="form-control" name="tipo_plan_operador_actual" value="{{$cliente->tipo_plan_operador_actual}}">
											<option value="postpago">Postpago</option>
											<option value="prepago">Prepago</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="nip" id="nip" class="form-control input-sm" placeholder="NIP" value="{{$cliente->nip}}">
									</div>
									<div class="form-group">
										<input type="text" name="fecha_portabilidad" id="fecha_portabilidad" class="form-control input-sm" placeholder="Fecha de portabilidad" value="{{$cliente->fecha_portabilidad}}">
									</div>
									<div class="form-group">
										<input type="text" name="cuenta_flash" id="cuenta_flash" class="form-control input-sm" placeholder="Cuenta Flash" value="{{$cliente->cuenta_flash}}">
									</div>
									<div class="form-group">
										<input type="text" name="contrasena_cuenta" id="contrasena_cuenta" class="form-control input-sm" placeholder="Contraseña cuenta" value="{{$cliente->contrasena_cuenta}}">
									</div>
									<div class="form-group">
										<input type="text" name="correo_creado" id="correo_creado" class="form-control input-sm" placeholder="Correo creado" value="{{$cliente->correo_creado}}">
									</div>
									<div class="form-group">
										<input type="text" name="contrasena_correo" id="contrasena_correo" class="form-control input-sm" placeholder="Contraseña Correo" value="{{$cliente->contrasena_correo}}">
									</div>
									<div class="form-group">
										<select class="form-control" name="estado">
											<option value="activo">Activo</option>
											<option value="inactivo">Inactivo</option>
										</select>
									</div>
									<div class="form-group">
										<label for="foto">Foto</label>
										<input type="file" name="foto" id="foto" class="form-control input-sm" placeholder="Seleccionar foto">
									</div>
									<div class="form-group">
										<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
										<input type="submit"  value="Guardar" class="btn btn-success btn-block">
										<a href="{{ route('cliente.index') }}" class="btn btn-info btn-block" >Atrás</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
<style type="text/css">
.cliente_form .form-group{
	width: 50%;
	padding-right: 5%;
	float: left;
}
.cliente_form .form-group select{
	height: 30px;
	font-size: 12px;

}
</style>
