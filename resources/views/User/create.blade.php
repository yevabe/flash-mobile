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
					<h3 class="panel-title">Nueva tienda</h3>
				</div>
				<div class="panel-body">
					<div class="table-container">
						<form method="POST" action="{{ route('tiendas.store') }}"  role="form" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 cliente_form">
									<div class="form-group">
										<input type="text" name="username" required id="username" class="form-control input-sm" placeholder="Código">
									</div>
									<div class="form-group">
										<input type="text" name="name" required id="name" class="form-control input-sm" placeholder="Nombre">
									</div>
									<div class="form-group">
										<input type="text" name="celular" id="celular" class="form-control input-sm" placeholder="Celular">
									</div>
									<div class="form-group">
										<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Correo electronico">
									</div>
									<div class="form-group">
										<input type="password" name="password" required id="password" class="form-control input-sm" placeholder="Contraseña">
									</div>
									<div class="form-group">
										<input type="file" name="foto" id="foto" class="form-control input-sm" placeholder="Fotografía">
									</div>
									<div class="form-group">
										<div class="radio">
										  <label><input type="checkbox" value="1" name="active" checked>Activo</label>
										</div>
									</div>
									<div class="form-group">
										<input type="submit"  value="Guardar" class="btn btn-success btn-block">
										<a href="{{ route('tiendas.index') }}" class="btn btn-info btn-block" >Atrás</a>
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
