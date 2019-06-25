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
					<h3 class="panel-title">Nuevo Cliente</h3>
				</div>
				<div class="panel-body">
					<div class="table-container">
						<form method="POST" action="{{ route('cliente.store') }}"  role="form" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 cliente_form">
									<div class="form-group">
										<input type="text" required name="codigo" id="codigo" class="form-control input-sm" placeholder="Código cliente">
									</div>
									<div class="form-group">
										<input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Cédula">
									</div>
									<div class="form-group">
										<input type="text" name="expedicion" id="expedicion" class="form-control input-sm" placeholder="Fecha de expedición">
									</div>
									<div class="form-group">
										<input type="text" required name="nombres" id="nombres" class="form-control input-sm" placeholder="Nombres">
									</div>

									<div class="form-group">
										<input type="text" required name="apellidos" id="apellidos" class="form-control input-sm" placeholder="Apellidos">
									</div>
									<div class="form-group">
										<input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Dirección">
									</div>
									<div class="form-group">
										<input type="text" name="barrio" id="barrio" class="form-control input-sm" placeholder="Barrio">
									</div>
									<div class="form-group">
										<input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="Ciudad">
									</div>
									<div class="form-group">
										<input type="text" name="departamento" id="departamento" class="form-control input-sm" placeholder="Departamento">
									</div>
									<div class="form-group">
										<input type="text" name="nacimiento" id="nacimiento" class="form-control input-sm" placeholder="Fecha de nacimiento">
									</div>
									<div class="form-group">
										<input type="text" name="celular" id="celular" class="form-control input-sm" placeholder="# Celular">
									</div>
									<div class="form-group">
										<input type="text" name="referido_id" id="referido_id" class="form-control input-sm" placeholder="Referido id">
									</div>
									<div class="form-group">
										<input type="text" name="referido_nombre" id="referido_nombre" class="form-control input-sm" placeholder="Referido nombre">
									</div>
									<div class="form-group">
										<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Correo electronico">
									</div>
									<div class="form-group">
										<input type="text" name="activacion" id="activacion" class="form-control input-sm" placeholder="Fecha de activación">
									</div>
									<div class="form-group">
										<input type="text" name="chip" id="chip" class="form-control input-sm" placeholder="Número de chip">
									</div>
									<div class="form-group">
										<label for="foto_chip">Foto Chip</label>
										<input type="file" name="foto_chip" id="foto_chip" class="form-control" placeholder="Foto de chip">
									</div>
									<div class="form-group">
										<input type="text" name="numero_temporal_flash" id="numero_temporal_flash" class="form-control input-sm" placeholder="Número temporal flash">
									</div>
									<div class="form-group">
										<input type="text" name="valor_recarga_activacion" id="valor_recarga_activacion" class="form-control input-sm" placeholder="Valor recarga activación">
									</div>
									<div class="form-group">
										<input type="text" name="fecha_renovacion" id="fecha_renovacion" class="form-control input-sm" placeholder="Fecha renovación">
									</div>
									<div class="form-group">
										<input type="text" name="plan_flash_mobile" id="plan_flash_mobile" class="form-control input-sm" placeholder="Plan flash mobile">
									</div>
									<div class="form-group">
										<input type="text" name="numero_a_portar" id="numero_a_portar" class="form-control input-sm" placeholder="Número a portar">
									</div>
									<div class="form-group">
										<input type="text" name="operador" id="operador" class="form-control input-sm" placeholder="Operador">
									</div>
									<div class="form-group">
										<select class="form-control" name="tipo_plan_operador_actual">
											<option value="postpago">Postpago</option>
											<option value="prepago">Prepago</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="nip" id="nip" class="form-control input-sm" placeholder="NIP">
									</div>
									<div class="form-group">
										<input type="text" name="fecha_portabilidad" id="fecha_portabilidad" class="form-control input-sm" placeholder="Fecha de portabilidad">
									</div>
									<div class="form-group">
										<input type="text" name="cuenta_flash" id="cuenta_flash" class="form-control input-sm" placeholder="Cuenta Flash">
									</div>
									<div class="form-group">
										<input type="text" name="contrasena_cuenta" id="contrasena_cuenta" class="form-control input-sm" placeholder="Contraseña cuenta">
									</div>
									<div class="form-group">
										<input type="text" name="correo_creado" id="correo_creado" class="form-control input-sm" placeholder="Correo creado">
									</div>
									<div class="form-group">
										<input type="text" name="contrasena_correo" id="contrasena_correo" class="form-control input-sm" placeholder="Contrasela Correo">
									</div>
									<div class="form-group">
										<select class="form-control" name="estado">
											<option value="activo">Activo</option>
											<option value="inactivo">Inactivo</option>
										</select>
									</div>
									<div class="form-group">
										<label for="foto">Foto</label>
										<input type="file" name="foto" id="foto" class="form-control" placeholder="Seleccionar foto">
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
