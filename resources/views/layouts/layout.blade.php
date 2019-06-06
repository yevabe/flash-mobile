<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<title>Mi Flash Mobile</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Flash Mobile</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/cliente"><span class="glyphicon glyphicon-user"></span> Clientes</a></li>
				<li><a href="/tiendas"><span class="glyphicon glyphicon-home"></span> Tiendas</a></li>

				<li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">


		@yield('content')

	</div>

	<style type="text/css">
		.table {
			border-top: 2px solid #ccc;

		}
	</style>
</body>
</html>
