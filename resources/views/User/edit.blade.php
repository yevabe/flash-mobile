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
						<form method="POST" action="/tiendas/save"  role="form">
							{{ csrf_field() }}

							<input name="_method" type="hidden" value="PATCH">

							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 cliente_form">
									<div class="form-group">
										<input type="text" name="username" required id="username" class="form-control input-sm" placeholder="Usuario" value="{{$user->username}}">
									</div>
									<div class="form-group">
										<input type="text" name="name" required id="name" class="form-control input-sm" placeholder="Nombre" value="{{$user->name}}">
									</div>
									<div class="form-group">
										<input type="text" name="email" required id="email" class="form-control input-sm" placeholder="Correo electronico" value="{{$user->email}}">
									</div>
									<div class="form-group">
										<input type="password" name="password" required id="password" class="form-control input-sm" placeholder="Cambiar contraseña" value="">
									</div>
									<div class="form-group">
										<div class="radio">
										  <label><input type="radio" value="1" @if($user->active==1) checked @endif name="active">Activo</label>
										</div>
									</div>
									<div class="form-group">
										<input type="hidden" name="id" value="{{$user->id}}">

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
